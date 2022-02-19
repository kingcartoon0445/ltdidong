<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\DiaDanh;
use App\Models\BaiViet;
use App\Models\DanhGia;
use App\Models\NguoiDung;
use App\Models\DeXuat;
use App\Models\Mien;
use App\Models\AnhDiaDanh;
use App\Models\TheLoai;
use App\Models\ThuocTheLoai;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Storage;

class DiaDanhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $listDiaDanh = DiaDanh::join('Miens','dia_danhs.MaMien','=','Miens.id')
        ->join('danh_gias','danh_gias.MaDiaDanh','=','dia_danhs.id')
        ->join('bai_viets','bai_viets.MaDiaDanh','=','dia_danhs.id')
        ->where('dia_danhs.TrangThai',1)
        ->select('dia_danhs.id','dia_danhs.Ten','MaMien','TenMien','KinhDo','ViDo','MoTa','AnhBia','DiaChi',DanhGia::raw(" AVG(danh_gias.SoDanhGia) AS danhgia"),BaiViet::raw("Count(bai_viets.id) AS share"))
        ->groupBy('dia_danhs.id','dia_danhs.Ten','MaMien','TenMien','KinhDo','ViDo','MoTa','AnhBia','DiaChi')->get();
        if($listDiaDanh=='[]'){
        $listDiaDanh = DiaDanh::join('Miens','dia_danhs.MaMien','=','Miens.id')
        ->join('danh_gias','danh_gias.MaDiaDanh','=','dia_danhs.id')
        ->where('dia_danhs.TrangThai',1)
        ->select('dia_danhs.id','dia_danhs.Ten','MaMien','TenMien','KinhDo','ViDo','MoTa','AnhBia','DiaChi',DanhGia::raw(" AVG(danh_gias.SoDanhGia) AS danhgia"),BaiViet::raw("0 AS share"))
        ->groupBy('dia_danhs.id','dia_danhs.Ten','MaMien','TenMien','KinhDo','ViDo','MoTa','AnhBia','DiaChi')->get();
       }else if($listDiaDanh=='[]'){
        $listDiaDanh = DiaDanh::join('Miens','dia_danhs.MaMien','=','Miens.id')
        ->join('bai_viets','bai_viets.MaDiaDanh','=','dia_danhs.id')
        ->where('dia_danhs.TrangThai',1)
        ->select('dia_danhs.id','dia_danhs.Ten','MaMien','TenMien','KinhDo','ViDo','MoTa','AnhBia','DiaChi',DanhGia::raw("0 AS danhgia"),BaiViet::raw("Count(bai_viets.id) AS share"))
        ->groupBy('dia_danhs.id','dia_danhs.Ten','MaMien','TenMien','KinhDo','ViDo','MoTa','AnhBia','DiaChi')->get();
       }else{
        $listDiaDanh = DiaDanh::join('Miens','dia_danhs.MaMien','=','Miens.id')
        ->where('dia_danhs.TrangThai',1)
        ->select('dia_danhs.id','dia_danhs.Ten','MaMien','TenMien','KinhDo','ViDo','MoTa','AnhBia','DiaChi',DanhGia::raw("0 AS danhgia"),BaiViet::raw("0 AS share"))
        ->groupBy('dia_danhs.id','dia_danhs.Ten','MaMien','TenMien','KinhDo','ViDo','MoTa','AnhBia','DiaChi')->get();
       }
        foreach($listDiaDanh as $diaDanh){
            if(Storage::disk('public')->exists($diaDanh->AnhBia)){
                $diaDanh->AnhBia = Storage::url($diaDanh->AnhBia);
            }
            else{
                $diaDanh->AnhBia = Storage::url('images/no_image_holder.png');
            }

            foreach($diaDanh->anhDiaDanhs as $anhDiaDanh){
                if(Storage::disk('public')->exists($anhDiaDanh->Anh)){
                    $anhDiaDanh->Anh = Storage::url($anhDiaDanh->Anh);
                }
                else{
                    $anhDiaDanh->Anh = Storage::url('images/no_image_holder.png');
                }
            }
        }

        return response()->json($listDiaDanh, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'Ten' => 'required',
            'MaMien' => 'required',
            'KinhDo' => 'required',
            'ViDo' => 'required',
            'DiaChi' => 'required',
            'MoTa' => 'required',
            'theloais' => 'required',
            'nd' => 'required',
            'hinh' => 'max:5000',
        ],[
            'Ten.required' => 'Vui lòng nhập tên địa danh',
            'MaMien.required' => 'Vui lòng chọn miền',
            'KinhDo.required' => 'Vui lòng nhập kinh độ',
            'ViDo.required' => 'Vui lòng nhập vĩ độ',
            'DiaChi.required' => 'Vui lòng nhập địa chỉ',
            'MoTa.required' => 'Vui lòng nhập mô tả',
            'theloais.required' => 'Vui lòng chọn thể loại',
            'nd.required'=>'thiếu người đề xuất',
            'hinh.max' => 'Tối đa 5 MB',
        ]);

        $diaDanh = new DiaDanh;
        $diaDanh->fill([
            'Ten'=>$request->input('Ten'),
            'MaMien'=>$request->input('MaMien'),
            'KinhDo'=>$request->input('KinhDo'),
            'ViDo'=>$request->input('ViDo'),
            'MoTa'=>$request->input('MoTa'),
            'DiaChi'=>$request->input('DiaChi'),
            'AnhBia'=>'avt.png',
            'TrangThai'=>'3',
        ]);

        $diaDanh->save();

        if($request->hasFile('hinh')){
            $diaDanh->AnhBia = $request->file('hinh')->store('images/diadanh/'.$diaDanh->id.'/cover', 'public');
        }

        if($request->hasFile('images')){
            $files = $request->file('images');

            foreach($files as $file){
                $anhDiaDanh = new AnhDiaDanh;
                $anhDiaDanh->fill([
                    'MaDiaDanh'=>$diaDanh->id,
                    'Anh'=>$file->store('images/diadanh/'.$diaDanh->id.'/images', 'public'),
                ]);
                $anhDiaDanh->save();
            }}
       $dexuat= new DeXuat;
       $dexuat->fill([
           'MaNguoiDung'=>$request->input('nd'),
            'MaDiaDanh'=>$diaDanh->id
       ]);
       $dexuat->save();
        
        }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $diaDanh = DiaDanh::join('Miens','dia_danhs.MaMien','=','Miens.id')
        ->join('danh_gias','danh_gias.MaDiaDanh','=','dia_danhs.id')
        ->where('dia_danhs.TrangThai',1)
        ->select('dia_danhs.id','dia_danhs.Ten','MaMien','TenMien','KinhDo','ViDo','MoTa','AnhBia','DiaChi',DanhGia::raw(" AVG(danh_gias.SoDanhGia) AS danhgia"))->groupBy('dia_danhs.id','dia_danhs.Ten','MaMien','TenMien','KinhDo','ViDo','MoTa','AnhBia','DiaChi')->where('dia_danhs.id',$id)->first();
    
        if(Storage::disk('public')->exists($diaDanh->AnhBia)){
            $diaDanh->AnhBia = Storage::url($diaDanh->AnhBia);
        }
        else{
            $diaDanh->AnhBia = Storage::url('images/no_image_holder.png');
        }

        foreach($diaDanh->anhDiaDanhs as $anhDiaDanh){
            if(Storage::disk('public')->exists($anhDiaDanh->Anh)){
                $anhDiaDanh->Anh = Storage::url($anhDiaDanh->Anh);
            }
            else{
                $anhDiaDanh->Anh = Storage::url('images/no_image_holder.png');
            }
        }
        
        return response()->json([$diaDanh], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
