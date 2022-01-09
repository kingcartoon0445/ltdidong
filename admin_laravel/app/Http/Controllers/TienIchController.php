<?php

namespace App\Http\Controllers;

use App\Models\TienIch;
use App\Http\Requests\StoreTienIchRequest;
use App\Http\Requests\UpdateTienIchRequest;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class TienIchController extends Controller
{
    protected function fixImage(TienIch $tienIch)
    {
        if(Storage::disk('public')->exists($tienIch->Anh)){
            $tienIch->Anh = Storage::url($tienIch->Anh);
        }
        else{
            $tienIch->Anh = 'storage/images/no_image_holder.png';
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listTienIch = TienIch::all();

        foreach($listTienIch as $tienIch) {
            $this->fixImage($tienIch);
        }

        return view('tienich.danhsach', ['listTienIch'=>$listTienIch]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tienich.them');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTienIchRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTienIchRequest $request)
    {
        $request->validate([
            'txtTenDaiDien' => 'required',
            'txtLoai' => 'required',
            'txtDiaChi' => 'required',
            'txtMoTa' => 'required',
            'txtSDT' => 'required',
            'hinh' => ['mimetypes:image/*', 'max:5000'],
        ]);

        if($request->input('txtTrangThai') == 'Hoạt động')
            $trangthai = 1;
        else
            $trangthai = 0;

        $tienIch = new TienIch;
        $tienIch->fill([
            'Ten'=>$request->input('txtTenDaiDien'),
            'Loai'=>$request->input('txtLoai'),
            'DiaChi'=>$request->input('txtDiaChi'),
            'MoTa'=>$request->input('txtMoTa'),
            'SDT'=>$request->input('txtSDT'),
            'Anh'=>'',
            'TrangThai'=>$trangthai,
        ]);

        $tienIch->save();

        if($request->hasFile('hinh')){
            $tienIch->Anh = $request->file('hinh')->store('images/tienich/'.$tienIch->id, 'public');
        }

        $tienIch->save();

        return Redirect::route('tienIch.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TienIch  $tienIch
     * @return \Illuminate\Http\Response
     */
    public function show(TienIch $tienIch)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TienIch  $tienIch
     * @return \Illuminate\Http\Response
     */
    public function edit(TienIch $tienIch)
    {
        $this->fixImage($tienIch);

        return view('tienich.sua', ['tienIch'=>$tienIch]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTienIchRequest  $request
     * @param  \App\Models\TienIch  $tienIch
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTienIchRequest $request, TienIch $tienIch)
    {
        $request->validate([
            'txtTenDaiDien' => 'required',
            'txtLoai' => 'required',
            'txtDiaChi' => 'required',
            'txtMoTa' => 'required',
            'txtSDT' => 'required',
            'hinh' => ['mimetypes:image/*', 'max:5000'],
        ]);

        if($request->input('txtTrangThai') == 'Hoạt động')
            $trangthai = 1;
        else
            $trangthai = 0;

        if($request->hasFile('hinh')){
            $tienIch->Anh = $request->file('hinh')->store('images/tienich/'.$tienIch->id, 'public');
        }

        $tienIch->fill([
            'Ten'=>$request->input('txtTenDaiDien'),
            'Loai'=>$request->input('txtLoai'),
            'DiaChi'=>$request->input('txtDiaChi'),
            'MoTa'=>$request->input('txtMoTa'),
            'SDT'=>$request->input('txtSDT'),
            'TrangThai'=>$trangthai,
        ]);

        $tienIch->save();

        return Redirect::route('tienIch.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TienIch  $tienIch
     * @return \Illuminate\Http\Response
     */
    public function destroy(TienIch $tienIch)
    {
        $tienIch->delete();

        return Redirect::route('tienIch.index');
    }
}
