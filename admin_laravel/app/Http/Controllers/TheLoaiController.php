<?php

namespace App\Http\Controllers;

use App\Models\TheLoai;
use App\Http\Requests\StoreTheLoaiRequest;
use App\Http\Requests\UpdateTheLoaiRequest;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class TheLoaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $listTheLoai = TheLoai::all();

        return view('theloai.danhsach', ['listTheLoai'=>$listTheLoai]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('theLoai.them');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTheLoaiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTheLoaiRequest $request)
    {
        $request->validate([
            'txtTenTheLoai' => 'required',
        ]);
        
        //
        if($request->input('txtTrangThai') == 'Hoạt động')
            $trangthai = 1;
        else
            $trangthai = 0;

        $theLoai=new TheLoai;
        $theLoai->fill([
            'Ten'=>$request->input('txtTenTheLoai'),
            'TrangThai'=>$trangthai,
        ]);

        $theLoai->save();

        return Redirect::route('theLoai.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TheLoai  $theLoai
     * @return \Illuminate\Http\Response
     */
    public function show(TheLoai $theLoai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TheLoai  $theLoai
     * @return \Illuminate\Http\Response
     */
    public function edit(TheLoai $theLoai)
    {
        //
        return view('theloai.sua', ['theLoai'=>$theLoai]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTheLoaiRequest  $request
     * @param  \App\Models\TheLoai  $theLoai
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTheLoaiRequest $request, TheLoai $theLoai)
    {
        $request->validate([
            'txtTenTheLoai' => 'required',
        ]);
        
        //
        if($request->input('txtTrangThai') == 'Hoạt động')
            $trangthai = 1;
        else
            $trangthai = 0;

        $theLoai->fill([
            'Ten'=>$request->input('txtTenTheLoai'),
            'TrangThai'=>$trangthai,
        ]);

        $theLoai->save();

        return Redirect::route('theLoai.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TheLoai  $theLoai
     * @return \Illuminate\Http\Response
     */
    public function destroy(TheLoai $theLoai)
    {
        //
        $theLoai->delete();

        return Redirect::route('theLoai.index');
    }
}
