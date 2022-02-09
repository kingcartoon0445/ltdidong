<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\CoTienIch;
use App\Models\NguoiDung;
use App\Models\DiaDanh;

use Illuminate\Support\Facades\Storage;

use DB;

class TrashController extends Controller
{
    protected function fixImage($nguoiDung){
        if(Storage::disk('public')->exists($nguoiDung->AnhNen)){
            $nguoiDung->AnhNen = Storage::url($nguoiDung->AnhNen);
        }
        else{
            $nguoiDung->AnhNen = Storage::url('images/no_image_holder.png');
        }
    }

    //Miền
    public function mienIndex(){
        $data = NguoiDung::where('id','=',session('LoggedUser'))->first();
        $this->fixImage($data);

        $listMien = DB::table('miens')->where('deleted_at','!=',NULL)->get();

        return view('rac.mien-danhsach', [
            'listMien'=>$listMien,
            'LoggedUserInfo'=>$data
        ]);
    }

    public function mienEdit($id){
        DB::table('miens')->where('id',$id)->update(['deleted_at' => NULL]);

        return back();
    }

    //Thể loại
    public function theLoaiIndex(){
        $data = NguoiDung::where('id','=',session('LoggedUser'))->first();
        $this->fixImage($data);

        $listTheLoai = DB::table('the_loais')->where('deleted_at','!=',NULL)->get();

        return view('rac.theloai-danhsach', [
            'listTheLoai'=>$listTheLoai,
            'LoggedUserInfo'=>$data
        ]);
    }

    public function theLoaiEdit($id){
        DB::table('the_loais')->where('id',$id)->update(['deleted_at' => NULL]);

        return back();
    }

    //Địa danh
    public function diaDanhIndex(){
        $data = NguoiDung::where('id','=',session('LoggedUser'))->first();
        $this->fixImage($data);

        $listdiaDanh =  DB::table('dia_danhs')
                            ->join('miens','dia_danhs.MaMien','=','miens.id')
                            ->where('dia_danhs.deleted_at','!=',null)
                            ->select('dia_danhs.id','dia_danhs.Ten','miens.TenMien','dia_danhs.deleted_at')
                            ->get();

        return view('rac.diadanh-danhsach', [
            'listdiaDanh'=>$listdiaDanh,
            'LoggedUserInfo'=>$data
        ]);
    }

    public function diaDanhEdit($id){
        DB::table('dia_danhs')->where('id',$id)->update(['deleted_at' => NULL]);

        return back();
    }

    //Người dùng
    public function nguoiDungIndex(){
        $data = NguoiDung::where('id','=',session('LoggedUser'))->first();
        $this->fixImage($data);

        $listnguoiDung = DB::table('nguoi_dungs')->where('deleted_at','!=',null)->get();
        foreach ($listnguoiDung as $nguoiDung) {
            $this->fixImage($nguoiDung);
        }

        return view('rac.nguoidung-danhsach', [
            'listnguoiDung'=>$listnguoiDung,
            'LoggedUserInfo'=>$data
        ]);
    }

    public function nguoiDungEdit($id){
        DB::table('nguoi_dungs')->where('id',$id)->update(['deleted_at' => NULL]);

        return back();
    }

    //Bài viết
    public function baiVietIndex(){
        $data = NguoiDung::where('id','=',session('LoggedUser'))->first();
        $this->fixImage($data);

        $listbaiViet = DB::table('bai_viets')
        ->join('dia_danhs','dia_danhs.id','=','bai_viets.MaDiaDanh')
        ->join('nguoi_dungs','nguoi_dungs.id','=','bai_viets.MaNguoiDung')
        ->select('bai_viets.id','bai_viets.TieuDe','dia_danhs.Ten','nguoi_dungs.TenDaiDien','bai_viets.deleted_at')
        ->where('bai_viets.deleted_at','!=',null)->get();

        return view('rac.baiviet-danhsach', [
            'listbaiViet'=>$listbaiViet,
            'LoggedUserInfo'=>$data
        ]);
    }

    public function baiVietEdit($id){
        DB::table('bai_viets')->where('id',$id)->update(['deleted_at' => NULL]);

        return back();
    }

    //Tiện ích
    public function tienIchIndex(){
        $data = NguoiDung::where('id','=',session('LoggedUser'))->first();
        $this->fixImage($data);

        $listTienIch = DB::table('tien_iches')->where('deleted_at','!=',null)->get();
        $listCoTienIch = CoTienIch::all();
        $listDiaDanh = DiaDanh::all();

        return view('rac.tienich-danhsach', [
            'listTienIch'=>$listTienIch,
            'listDiaDanh'=>$listDiaDanh,
            'listCoTienIch'=>$listCoTienIch,
            'LoggedUserInfo'=>$data
        ]);
    }

    public function tienIchEdit($id){
        DB::table('tien_iches')->where('id',$id)->update(['deleted_at' => NULL]);

        return back();
    }
}
