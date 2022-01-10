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
            $nguoiDung->AnhNen = 'storage/images/no_image_holder.png';
        }
    }

    public function index()
    {
        $listnguoiDung = NguoiDung::all();
        
        $data = NguoiDung::where('id','=',session('LoggedUser'))->first();
        $this->fixImage($data);

        foreach($listnguoiDung as $nguoiDung) {
            $this->fixImage($nguoiDung);
        }

        return view('nguoidung.danhsach', [
            'listnguoiDung'=>$listnguoiDung,
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
        $data = NguoiDung::where('id','=',session('LoggedUser'))->first();
        $this->fixImage($data);

        return view('nguoidung.them', ['LoggedUserInfo'=>$data]);
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
            'TenDaiDien' => 'required',
            'HoTen' => 'required',
            'Email' => ['required','email','unique:nguoi_dungs'],
            'SDT' => ['required','min:10','max:12'],
            'MatKhau' => 'required',
            'hinh' => ['mimetypes:image/*','max:5000'],
        ]);

        if($request->input('TrangThai') == 'Hoạt động')
            $trangthai = 1;
        else
            $trangthai = 0;

        if($request->has('checkIsAdmin'))
            $isAdmin = 1;
        else
            $isAdmin = 0;

        $nguoiDung = new NguoiDung;
        $nguoiDung->fill([
            'TenDaiDien'=>$request->input('TenDaiDien'),
            'HovaTen'=>$request->input('HoTen'),
            'Email'=>$request->input('Email'),
            'SDT'=>$request->input('SDT'),
            'AnhNen'=>'',
            'MatKhau'=>$request->input('MatKhau'),
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
        $data = NguoiDung::where('id','=',session('LoggedUser'))->first();
        $this->fixImage($data);
        
        $this->fixImage($nguoiDung);
        
        return view('nguoidung.sua', [
            'nguoiDung'=>$nguoiDung,
            'LoggedUserInfo'=>$data
        ]);
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
            'TenDaiDien' => 'required',
            'HoTen' => 'required',
            'Email' => ['required','email','unique:nguoi_dungs'],
            'SDT' => ['required','min:10','max:12'],
            'MatKhau' => 'required',
            'hinh' => ['mimetypes:image/*', 'max:5000'],
        ]);
        
        if($request->input('TrangThai') == 'Hoạt động')
            $trangthai = 1;
        else
            $trangthai = 0;

        if($request->has('checkIsAdmin'))
            $isAdmin = 1;
        else
            $isAdmin = 0;

        try{
            if($request->hasFile('hinh')){
                $nguoiDung->AnhNen = $request->file('hinh')->store('images/nguoidung/'.$nguoiDung->id, 'public');
            }

            $nguoiDung->fill([
                'TenDaiDien'=>$request->input('TenDaiDien'),
                'HovaTen'=>$request->input('HoTen'),
                'Email'=>$request->input('Email'),
                'SDT'=>$request->input('SDT'),
                'MatKhau'=>$request->input('MatKhau'),
                'IsAdmin'=>$isAdmin,
                'TrangThai'=>$trangthai,
            ]);

            $nguoiDung->save();

            return Redirect::route('nguoiDung.index');
        }catch (\Exception $e) {
            if ($e->getCode() == 23000) {
                // Deal with duplicate key error
            }
        }
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
