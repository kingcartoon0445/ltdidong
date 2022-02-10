<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\BaiViet;
use App\Models\Like;
use App\Models\DiaDanh;
use App\Models\NguoiDung;
use App\Models\Mien;
use App\Models\AnhDiaDanh;
use App\Models\AnhBaiViet;
use App\Models\TheLoai;
use App\Models\ThuocTheLoai;

use Illuminate\Support\Facades\Storage;
use DB;

class BaiVietController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listBaiViet = BaiViet::join('nguoi_dungs','MaNguoiDung','=','nguoi_dungs.id')
        ->join('dia_danhs','MaDiaDanh','=','dia_danhs.id')
        ->where('bai_viets.TrangThai','1')
        ->select('bai_viets.id','MaNguoiDung','TenDaiDien','MaDiaDanh','Ten','TieuDe','NoiDung',Like::raw("count('likes.MaNguoiDung') AS thich"))
        ->groupBy('bai_viets.id','MaNguoiDung','TenDaiDien','MaDiaDanh','Ten','TieuDe','NoiDung')
        ->get();
        
        foreach($listBaiViet as $baiViet){
            foreach($baiViet->anhBaiViets as $anhBaiViet){
                if(Storage::disk('public')->exists($anhBaiViet->Anh)){
                    $anhBaiViet->Anh = Storage::url($anhBaiViet->Anh);
                }
                else{
                    $anhBaiViet->Anh = Storage::url('images/no_image_holder.png');
                }
            }
        }

        return response()->json($listBaiViet, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'TieuDe' => 'required',
            'NoiDung' => 'required',
            'MaDiaDanh' => 'required',
            'MaNguoiDung' => 'required',
            'images' => ['max:5000'],
        ],[
            'TieuDe.required' => 'Vui lòng nhập tiêu đề',
            'NoiDung.required' => 'Vui lòng nhập nội dung',
            'MaDiaDanh.required' => 'Vui lòng chọn địa danh',
            'MaNguoiDung.required' => 'Vui lòng chọn người đăng'
        ]);

        $baiViet = new BaiViet;
        $baiViet->fill([
            'TieuDe' => $data['TieuDe'],
            'NoiDung' => $data['NoiDung'],
            'MaDiaDanh' => $data['MaDiaDanh'],
            'MaNguoiDung' => $data['MaNguoiDung'],
        ]);

        $baiViet->save();

        if($request->hasFile('images')){
            $files = $request->file('images');

            foreach($files as $file){
                $anhBaiViet = new AnhBaiViet;
                $anhBaiViet->fill([
                    'MaBaiViet'=>$baiViet->id,
                    'Anh'=>$file->store('images/baiviet/'.$baiViet->id, 'public'),
                ]);
                $anhBaiViet->save();
            }
        }
        
        $newBaiViet = BaiViet::with('nguoidung', 'diadanh', 'anhBaiViets')->where('id', '=' , $baiViet->id)
                                                                        ->where('TrangThai', '=', 1)
                                                                        ->first();
        if($baiViet->id ==$newBaiViet->id)
        return ['thanhcong'=>'1'];else return ['thanhcong'=>'0'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $baiViet = BaiViet::join('nguoi_dungs','MaNguoiDung','=','nguoi_dungs.id')
        ->join('dia_danhs','MaDiaDanh','=','dia_danhs.id')
        ->select('bai_viets.id','MaNguoiDung','TenDaiDien','MaDiaDanh','Ten','TieuDe','NoiDung')
        ->where('bai_viets.id', '=' , $id)
        ->where('bai_viets.TrangThai', '=', 1)
        ->first();
        if(!$baiViet){
            return response()->json([
                'message' => 'Không tồn tại bài viết này'
            ], 400);
        }

        foreach($baiViet->anhBaiViets as $anhBaiViet){
            if(Storage::disk('public')->exists($anhBaiViet->Anh)){
                $anhBaiViet->Anh = Storage::url($anhBaiViet->Anh);
            }
            else{
                $anhBaiViet->Anh = Storage::url('images/no_image_holder.png');
            }
        }

        return response()->json($baiViet, 200);
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

    public function baiviettop5()
    {
        $listBaiViet = BaiViet::join('nguoi_dungs','MaNguoiDung','=','nguoi_dungs.id')
        ->join('dia_danhs','MaDiaDanh','=','dia_danhs.id')
        ->select('bai_viets.id','MaNguoiDung','TenDaiDien','MaDiaDanh','Ten','TieuDe','NoiDung',)
        ->where('bai_viets.TrangThai', '=', 1)
        ->orderBy('bai_viets.id', 'desc')
        ->take(5)
        ->get();
        foreach($listBaiViet as $baiViet){
            foreach($baiViet->anhBaiViets as $anhBaiViet){
                if(Storage::disk('public')->exists($anhBaiViet->Anh)){
                    $anhBaiViet->Anh = Storage::url($anhBaiViet->Anh);
                }
                else{
                    $anhBaiViet->Anh = Storage::url('images/no_image_holder.png');
                }
            }
        }
        return response()->json($listBaiViet, 200);
    }
    public function BaivietUS(Request $request) {
        $request->validate([
            'id' => 'required',
        ]);
    
        $listBaiViet = BaiViet::join('nguoi_dungs','MaNguoiDung','=','nguoi_dungs.id')
        ->join('dia_danhs','MaDiaDanh','=','dia_danhs.id')
        ->where('bai_viets.TrangThai','1')
        ->where('MaNguoiDung',$request->id)
        ->select('bai_viets.id','MaNguoiDung','TenDaiDien','MaDiaDanh','Ten','TieuDe','NoiDung')->get();
       // return $user;
      //  return [$request->password, $user->MatKhau];
    
      foreach($listBaiViet as $baiViet){
        foreach($baiViet->anhBaiViets as $anhBaiViet){
            if(Storage::disk('public')->exists($anhBaiViet->Anh)){
                $anhBaiViet->Anh = Storage::url($anhBaiViet->Anh);
            }
            else{
                $anhBaiViet->Anh = Storage::url('images/no_image_holder.png');
            }
        }
    }
    return response()->json($listBaiViet, 200);
    }
    public function BaiVietNhieuLike(){
        $listBaiViet = BaiViet::join('nguoi_dungs','MaNguoiDung','=','nguoi_dungs.id')
        ->join('dia_danhs','MaDiaDanh','=','dia_danhs.id')
        ->join('likes','bai_viets.id','=','likes.MaBaiViet')
        ->where('bai_viets.TrangThai','1')
        ->select('bai_viets.id','bai_viets.MaNguoiDung','TenDaiDien','bai_viets.MaDiaDanh','Ten','TieuDe','NoiDung',Like::raw("count('likes.MaNguoiDung') AS thich"))
        ->where('bai_viets.id','=','likes.MaBaiViet')
        ->groupBy('bai_viets.id','bai_viets.MaNguoiDung','TenDaiDien','MaDiaDanh','Ten','TieuDe','NoiDung')
        ->orderBy('thich','desc')
        ->get();
        
        foreach($listBaiViet as $baiViet){
            foreach($baiViet->anhBaiViets as $anhBaiViet){
                if(Storage::disk('public')->exists($anhBaiViet->Anh)){
                    $anhBaiViet->Anh = Storage::url($anhBaiViet->Anh);
                }
                else{
                    $anhBaiViet->Anh = Storage::url('images/no_image_holder.png');
                }
            }
        }

        return response()->json($listBaiViet, 200);
    }
}
