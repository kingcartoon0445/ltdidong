<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\BaiViet;
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
        $listBaiViet = BaiViet::with('nguoidung', 'diadanh', 'anhBaiViets')->where('TrangThai', 1)->get();
        
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
            'images' => 'max:5000',
        ],[
            'TieuDe.required' => 'Vui lòng nhập tiêu đề',
            'NoiDung.required' => 'Vui lòng nhập nội dung',
            'MaDiaDanh.required' => 'Vui lòng chọn địa danh',
            'MaNguoiDung.required' => 'Vui lòng chọn người đăng',
            'images.max' => 'Tối đa 5 MB',
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
        return response()->json($newBaiViet, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $baiViet = BaiViet::with('nguoidung', 'diadanh', 'anhBaiViets')->where('id', '=' , $id)
                                                                            ->where('TrangThai', '=', 1)
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
}
