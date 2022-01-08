<?php

namespace App\Http\Controllers;

use App\Models\LoaiTaiKhoan;
use App\Http\Requests\StoreLoaiTaiKhoanRequest;
use App\Http\Requests\UpdateLoaiTaiKhoanRequest;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class LoaiTaiKhoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $listLoaiTK = LoaiTaiKhoan::all();

        return view('nguoidung.loaitaikhoan.danhsach', ['listLoaiTK'=>$listLoaiTK]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('nguoidung.loaitaikhoan.them');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLoaiTaiKhoanRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLoaiTaiKhoanRequest $request)
    {
        $request->validate([
            'txtTenLoaiTaiKhoan' => 'required',
        ]);

        if($request->input('txtTrangThai') == 'Hoạt động')
            $trangthai = 1;
        else
            $trangthai = 0;

        $loaiTaiKhoan=new LoaiTaiKhoan;
        $loaiTaiKhoan->fill([
            'TenLoaiTK'=>$request->input('txtTenLoaiTaiKhoan'),
            'TrangThai'=>$trangthai,
        ]);

        $loaiTaiKhoan->save();

        return Redirect::route('loaiTaiKhoan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LoaiTaiKhoan  $loaiTaiKhoan
     * @return \Illuminate\Http\Response
     */
    public function show(LoaiTaiKhoan $loaiTaiKhoan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\LoaiTaiKhoan  $loaiTaiKhoan
     * @return \Illuminate\Http\Response
     */
    public function edit(LoaiTaiKhoan $loaiTaiKhoan)
    {
        return view('nguoidung.loaitaikhoan.sua', ['loaiTaiKhoan'=>$loaiTaiKhoan]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLoaiTaiKhoanRequest  $request
     * @param  \App\Models\LoaiTaiKhoan  $loaiTaiKhoan
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLoaiTaiKhoanRequest $request, LoaiTaiKhoan $loaiTaiKhoan)
    {
        $request->validate([
            'txtTenLoaiTaiKhoan' => 'required',
        ]);

        if($request->input('txtTrangThai') == 'Hoạt động')
            $trangthai = 1;
        else
            $trangthai = 0;

        $loaiTaiKhoan->fill([
            'TenLoaiTK'=>$request->input('txtTenLoaiTaiKhoan'),
            'TrangThai'=>$trangthai,
        ]);

        $loaiTaiKhoan->save();

        return Redirect::route('loaiTaiKhoan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LoaiTaiKhoan  $loaiTaiKhoan
     * @return \Illuminate\Http\Response
     */
    public function destroy(LoaiTaiKhoan $loaiTaiKhoan)
    {
        $loaiTaiKhoan->delete();

        return Redirect::route('loaiTaiKhoan.index');
    }
}
