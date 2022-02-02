<?php

namespace App\Http\Controllers;

use App\Models\Mien;
use App\Models\NguoiDung;

use App\Http\Requests\StoreMienRequest;
use App\Http\Requests\UpdateMienRequest;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class MienController extends Controller
{
    protected function fixImage(NguoiDung $nguoiDung)
    {
        if(Storage::disk('public')->exists($nguoiDung->AnhNen)){
            $nguoiDung->AnhNen = Storage::url($nguoiDung->AnhNen);
        }
        else{
            $nguoiDung->AnhNen = Storage::url('images/no_image_holder.png');
        }
    }

    public function index()
    {
        $data = NguoiDung::where('id','=',session('LoggedUser'))->first();
        $this->fixImage($data);

        $listMien = Mien::all();

        return view('mien.danhsach', [
            'listMien'=>$listMien,
            'LoggedUserInfo'=>$data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMienRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMienRequest $request)
    {
        $request->validate([
            'TenMien' => ['required'],
        ]);

        $mien=new Mien;
        $mien->fill([
            'TenMien'=>$request->input('TenMien'),
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
        $data = NguoiDung::where('id','=',session('LoggedUser'))->first();
        $this->fixImage($data);
        
        return view('mien.sua', [
            'mien'=>$mien,
            'LoggedUserInfo'=>$data
        ]);
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
        $request->validate([
            'TenMien' => 'required',
        ]);

        $mien->fill([
            'TenMien'=>$request->input('TenMien'),
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
        $mien->delete();

        return Redirect::route('mien.index');
    }
}
