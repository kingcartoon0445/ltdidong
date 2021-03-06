<?php

namespace App\Http\Controllers;

use App\Models\DeXuat;
use App\Models\NguoiDung;
use App\Models\DiaDanh;

use App\Http\Requests\StoreDeXuatRequest;
use App\Http\Requests\UpdateDeXuatRequest;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use DB;

class DeXuatController extends Controller
{
    protected function fixImage_NguoiDung(NguoiDung $nguoiDung){
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
        $this->fixImage_NguoiDung($data);

        $listDeXuat = DeXuat::all();

        return view('dexuat.danhsach', [
            'listDeXuat'=>$listDeXuat,
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
     * @param  \App\Http\Requests\StoreDeXuatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDeXuatRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DeXuat  $deXuat
     * @return \Illuminate\Http\Response
     */
    public function show(DeXuat $deXuat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DeXuat  $deXuat
     * @return \Illuminate\Http\Response
     */
    public function edit(DeXuat $deXuat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDeXuatRequest  $request
     * @param  \App\Models\DeXuat  $deXuat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDeXuatRequest $request, DeXuat $deXuat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DeXuat  $deXuat
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeXuat $deXuat)
    {
        $diaDanh = DiaDanh::where('id','=',$deXuat->MaDiaDanh)->first();
        $diaDanh->fill([
            'TrangThai' => 2,
        ]);
        $diaDanh->save();

        $deXuat->delete();

        return Redirect::route('deXuat.index');
    }
}
