<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\BaiViet;
use App\Models\Like;
use App\Models\View;
use App\Models\DiaDanh;
use App\Models\DanhGia;
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
        ->where('bai_viets.TrangThai','=','1')
        ->select('bai_viets.id','MaNguoiDung','TenDaiDien','MaDiaDanh','Ten','TieuDe','NoiDung',Like::raw("count('likes.MaNguoiDung') AS thich"))
        ->orderBy('bai_viets.created_at','desc')
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
        $request->validate([
            'TieuDe' => 'required',
            'NoiDung' => 'required',
            'MaDiaDanh' => 'required',
            'MaNguoiDung' => 'required',
            'rating'=> 'required',
            'images' => 'max:5000',
            'images'=>'required'
        ],[
            'TieuDe.required' => 'Vui lòng nhập tiêu đề',
            'NoiDung.required' => 'Vui lòng nhập nội dung',
            'MaDiaDanh.required' => 'Vui lòng chọn địa danh',
            'MaNguoiDung.required' => 'Vui lòng chọn người đăng',
            'rating.required' => 'Vui lòng nhập số đánh giá',
            'images.max' => 'Tối đa 5 MB',
        ]);
        $files = $request->file('images');
        $baiViet = new BaiViet;
        $baiViet->fill([
            'TieuDe'=>$request->input('TieuDe'),
            'NoiDung'=>$request->input('NoiDung'),
            'MaDiaDanh'=>$request->input('MaDiaDanh'),
            'MaNguoiDung'=>$request->input('MaNguoiDung'),
        ]);
        
        $baiViet->save();

        $danhgia=new DanhGia;
        $danhgia->fill([
            'MaDiaDanh'=>$request->input('MaDiaDanh'),
            'MaNguoiDung'=>$request->input('MaNguoiDung'),
            'SoDanhGia'=>$request->input('rating'),
        ]);
        $danhgia->save();

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
        return $baiViet->id ;else '0';
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
        ->select('bai_viets.id','MaNguoiDung','TenDaiDien','MaDiaDanh','Ten','TieuDe','NoiDung',Like::raw("count('likes.MaNguoiDung') AS thich"))
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
        $baiViet = BaiViet::find($id);
        $baiViet->update($request->all());
     

        return 1;
        
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
        ->join('Views','MaBaiViet','=','bai_viets.id')
        ->where('bai_viets.TrangThai','=','1')
        ->select('bai_viets.id','bai_viets.MaNguoiDung','TenDaiDien','MaDiaDanh','Ten','TieuDe','NoiDung',View::raw("count('likes.MaNguoiDung') AS view"))
        ->groupBy('bai_viets.id','bai_viets.MaNguoiDung','TenDaiDien','MaDiaDanh','Ten','TieuDe','NoiDung')
        ->orderBy('view','desc')
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
    public function BVLienQuan(int $id)
    {
        $listBaiViet = BaiViet::join('nguoi_dungs','MaNguoiDung','=','nguoi_dungs.id')
        ->join('dia_danhs','MaDiaDanh','=','dia_danhs.id')
        ->where('bai_viets.TrangThai','1')
        ->where('dia_danhs.id',$id)
        ->orderBy('bai_viets.created_at','desc')
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

    public function KtraDD(int $ND, int $DD){
        $ktra= BaiViet:: where('MaNguoiDung',$ND)->where('MaDiaDanh',$DD)->get();
        $ktra2=BaiViet::where('MaNguoiDung','0')->where('MaDiaDanh','0')->get();
        if($ktra!=$ktra2)return ['den'=>'1'];else return['den'=>'0'];
    }
}
