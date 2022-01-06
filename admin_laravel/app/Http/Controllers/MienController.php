<?php

namespace App\Http\Controllers;

use App\Models\Mien;
use App\Http\Requests\StoreMienRequest;
use App\Http\Requests\UpdateMienRequest;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class MienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listMien = Mien::all();

        return view('mien.danhsach', ['listMien'=>$listMien]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mien.them');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMienRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMienRequest $request)
    {
        $mien=new Mien;
        $mien->fill([
            'TenMien'=>$request->input('txtTenMien'),
        ]);

        $mien->save();

        return Redirect::route('mien.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mien  $mien
     * @return \Illuminate\Http\Response
     */
    public function show(Mien $mien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mien  $mien
     * @return \Illuminate\Http\Response
     */
    public function edit(Mien $mien)
    {
        return view('mien.sua', ['mien'=>$mien]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMienRequest  $request
     * @param  \App\Models\Mien  $mien
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMienRequest $request, Mien $mien)
    {
        $mien->fill([
            'TenMien'=>$request->input('txtTenMien'),
        ]);

        $mien->save();

        return Redirect::route('mien.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mien  $mien
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mien $mien)
    {
        //
    }
}
