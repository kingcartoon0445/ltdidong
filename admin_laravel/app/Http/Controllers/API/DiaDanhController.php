<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\DiaDanh;
use App\Models\DanhGia;
use App\Models\BaiViet;
use App\Models\NguoiDung;
use App\Models\Mien;
use App\Models\AnhDiaDanh;
use App\Models\TheLoai;
use App\Models\ThuocTheLoai;

use Illuminate\Support\Facades\Storage;
use DB;

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
        ->where('dia_danhs.TrangThai',1)
        ->orWhere('dia_danhs.TrangThai',0)
        ->orWhere('dia_danhs.TrangThai',2)
        ->select('dia_danhs.id','dia_danhs.Ten','MaMien','TenMien','KinhDo','ViDo','MoTa','AnhBia','DiaChi',DanhGia::raw(" AVG(danh_gias.SoDanhGia) AS danhgia"))->groupBy('dia_danhs.id','dia_danhs.Ten','MaMien','TenMien','KinhDo','ViDo','MoTa','AnhBia','DiaChi')->get();
       
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
        ->where('dia_danhs.TrangThai',1)->where('dia_danhs.id',$id)
        ->orWhere('dia_danhs.TrangThai',0)
        ->orWhere('dia_danhs.TrangThai',2)
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

    public function demshare(int $id){
        $dem= BaiViet::where('MaDiaDanh','=',$id)->select(BaiViet::raw('Count(id) as dem'))->get();
        return $dem;
    }
}
