<?php

namespace App\Http\Controllers;

use App\Models\DiaDanh;
use App\Models\NguoiDung;
use App\Models\AnhBaiViet;

use App\Models\BaiViet;
use App\Http\Requests\StoreBaiVietRequest;
use App\Http\Requests\UpdateBaiVietRequest;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use DB;

class BaiVietController extends Controller
{
    protected function fixImage_NguoiDung(NguoiDung $nguoiDung)
    {
        if(Storage::disk('public')->exists($nguoiDung->AnhNen)){
            $nguoiDung->AnhNen = Storage::url($nguoiDung->AnhNen);
        }
        else{
            $nguoiDung->AnhNen = Storage::url('images/no_image_holder.png');
        }
    }

    protected function fixImage_AnhBaiViet(AnhBaiViet $anhBaiViet)
    {
        if(Storage::disk('public')->exists($anhBaiViet->Anh)){
            $anhBaiViet->Anh = Storage::url($anhBaiViet->Anh);
        }
        else{
            $anhBaiViet->Anh = Storage::url('images/no_image_holder.png');
        }
    }


    public function index()
    {
        $data = NguoiDung::where('id','=',session('LoggedUser'))->first();
        $this->fixImage_NguoiDung($data);

        $listbaiViet = BaiViet::all();
        $listnguoiDung = NguoiDung::all();
        $listdiaDanh = DiaDanh::all();

        return view('baiviet.danhsach', [
            'listbaiViet'=>$listbaiViet,
            'listnguoiDung'=>$listnguoiDung,
            'listdiaDanh'=>$listdiaDanh,

            'LoggedUserInfo'=>$data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreBaiVietRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBaiVietRequest $request)
    {
        $request->validate([
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
            'TieuDe'=>$request->input('TieuDe'),
            'NoiDung'=>$request->input('NoiDung'),
            'MaDiaDanh'=>$request->input('MaDiaDanh'),
            'MaNguoiDung'=>$request->input('MaNguoiDung'),
            'TrangThai'=>$request->input('TrangThai'),
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
        
        return Redirect::route('baiViet.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BaiViet  $baiViet
     * @return \Illuminate\Http\Response
     */
    public function show(BaiViet $baiViet)
    {
        $data = NguoiDung::where('id','=',session('LoggedUser'))->first();
        $this->fixImage_NguoiDung($data);

        $listAnh = $baiViet->anhBaiViets;
        foreach ($listAnh as $anh) {
            $this->fixImage_AnhBaiViet($anh);
        }

        return view('baiviet.show', [
            'baiViet'=>$baiViet,
            'listAnh'=>$listAnh,
            'LoggedUserInfo'=>$data,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BaiViet  $baiViet
     * @return \Illuminate\Http\Response
     */
    public function edit(BaiViet $baiViet)
    {
        $data = NguoiDung::where('id','=',session('LoggedUser'))->first();
        $this->fixImage_NguoiDung($data);

        $listAnh = $baiViet->anhBaiViets;
        foreach ($listAnh as $anh) {
            $this->fixImage_AnhBaiViet($anh);
        }

        $listnguoiDung = NguoiDung::all();
        $listdiaDanh = DiaDanh::all();

        return view('baiviet.sua', [
            'baiViet'=>$baiViet, 
            'listdiaDanh'=>$listdiaDanh, 
            'listnguoiDung'=>$listnguoiDung,
            'LoggedUserInfo'=>$data,
            'listAnh'=>$listAnh,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBaiVietRequest  $request
     * @param  \App\Models\BaiViet  $baiViet
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBaiVietRequest $request, BaiViet $baiViet)
    {
        $request->validate([
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
            'hinh.max' => 'Tối đa 5 MB',
        ]);

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

        $baiViet->fill([
            'TieuDe'=>$request->input('TieuDe'),
            'NoiDung'=>$request->input('NoiDung'),
            'MaDiaDanh'=>$request->input('MaDiaDanh'),
            'MaNguoiDung'=>$request->input('MaNguoiDung'),
            'TrangThai'=>$request->input('TrangThai'),
        ]);

        $baiViet->save();
        
        return Redirect::route('baiViet.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BaiViet  $baiViet
     * @return \Illuminate\Http\Response
     */
    public function destroy(BaiViet $baiViet)
    {
        $baiViet->delete();

        return Redirect::route('baiViet.index');
    }
}
