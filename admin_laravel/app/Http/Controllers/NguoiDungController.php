<?php

namespace App\Http\Controllers;

use App\Models\NguoiDung;

use App\Http\Requests\StoreNguoiDungRequest;
use App\Http\Requests\UpdateNguoiDungRequest;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class NguoiDungController extends Controller
{
    protected function fixImage(NguoiDung $nguoiDung)
    {
        if(Storage::disk('public')->exists($nguoiDung->AnhNen)){
            $nguoiDung->AnhNen = Storage::url($nguoiDung->AnhNen);
        }
        else{
            $nguoiDung->AnhNen = '/images/no_image_holder.png';
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listnguoiDung = NguoiDung::all();

        foreach($listnguoiDung as $nguoiDung) {
            $this->fixImage($nguoiDung);
        }

        return view('nguoidung.danhsach', ['listnguoiDung'=>$listnguoiDung]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('nguoidung.them');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreNguoiDungRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNguoiDungRequest $request)
    {
        $request->validate([
            'txtTenDaiDien' => 'required',
            'txtHoTen' => 'required',
            'txtEmail' => 'required',
            'txtSDT' => 'required',
            'txtMatKhau' => 'required',
            'hinh' => ['required', 'mimetypes:image/*', 'max:5000'],
        ]);

        if($request->input('txtTrangThai') == 'Hoạt động')
            $trangthai = 1;
        else
            $trangthai = 0;

        if($request->input('checkIsAdmin') == 'on')
            $isAdmin = 1;
        else
            $isAdmin = 0;

        $nguoiDung = new NguoiDung;
        $nguoiDung->fill([
            'TenDaiDien'=>$request->input('txtTenDaiDien'),
            'HovaTen'=>$request->input('txtHoTen'),
            'Email'=>$request->input('txtEmail'),
            'SDT'=>$request->input('txtSDT'),
            'AnhNen'=>'',
            'MatKhau'=>$request->input('txtMatKhau'),
            'IsAdmin'=>$isAdmin,
            'TrangThai'=>$trangthai,
        ]);

        $nguoiDung->save();

        if($request->hasFile('hinh')){
            $nguoiDung->AnhNen = $request->file('hinh')->store('images/nguoidung/'.$nguoiDung->id, 'public');
        }

        $nguoiDung->save();

        return Redirect::route('nguoiDung.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NguoiDung  $nguoiDung
     * @return \Illuminate\Http\Response
     */
    public function show(NguoiDung $nguoiDung)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NguoiDung  $nguoiDung
     * @return \Illuminate\Http\Response
     */
    public function edit(NguoiDung $nguoiDung)
    {
        $this->fixImage($nguoiDung);
        
        return view('nguoidung.sua', ['nguoiDung'=>$nguoiDung]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNguoiDungRequest  $request
     * @param  \App\Models\NguoiDung  $nguoiDung
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNguoiDungRequest $request, NguoiDung $nguoiDung)
    {
        $request->validate([
            'txtTenDaiDien' => 'required',
            'txtHoTen' => 'required',
            'txtEmail' => 'required',
            'txtSDT' => 'required',
            'txtMatKhau' => 'required',
            'hinh' => ['mimetypes:image/*', 'max:5000'],
        ]);
        
        if($request->input('txtTrangThai') == 'Hoạt động')
            $trangthai = 1;
        else
            $trangthai = 0;

        if($request->input('checkIsAdmin') == 'on')
            $isAdmin = 1;
        else
            $isAdmin = 0;

        if($request->hasFile('hinh')){
            $nguoiDung->AnhNen = $request->file('hinh')->store('images/nguoidung/'.$nguoiDung->id, 'public');
        }

        $nguoiDung->fill([
            'TenDaiDien'=>$request->input('txtTenDaiDien'),
            'HovaTen'=>$request->input('txtHoTen'),
            'Email'=>$request->input('txtEmail'),
            'SDT'=>$request->input('txtSDT'),
            'MatKhau'=>$request->input('txtMatKhau'),
            'IsAdmin'=>$isAdmin,
            'TrangThai'=>$trangthai,
        ]);

        $nguoiDung->save();

        return Redirect::route('nguoiDung.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NguoiDung  $nguoiDung
     * @return \Illuminate\Http\Response
     */
    public function destroy(NguoiDung $nguoiDung)
    {
        $nguoiDung->delete();

        return Redirect::route('nguoiDung.index');
    }
}
