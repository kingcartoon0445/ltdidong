<?php

namespace App\Http\Controllers;

use App\Models\TheLoai;
use App\Models\NguoiDung;

use App\Http\Requests\StoreTheLoaiRequest;
use App\Http\Requests\UpdateTheLoaiRequest;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class TheLoaiController extends Controller
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
        $listTheLoai = TheLoai::all();

        $data = NguoiDung::where('id','=',session('LoggedUser'))->first();
        $this->fixImage($data);

        return view('theloai.danhsach', [
            'listTheLoai'=>$listTheLoai,
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
            'TenTheLoai' => 'required',
        ],[
            'TenTheLoai.required' => 'Vui lòng nhập tên thể loại',
        ]);

        $theLoai=new TheLoai;
        $theLoai->fill([
            'Ten'=>$request->input('TenTheLoai'),
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
        $data = NguoiDung::where('id','=',session('LoggedUser'))->first();
        $this->fixImage($data);

        return view('theloai.sua', [
            'theLoai'=>$theLoai,
            'LoggedUserInfo'=>$data
        ]);
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
            'TenTheLoai' => 'required',
        ],[
            'TenTheLoai.required' => 'Vui lòng nhập tên thể loại',
        ]);

        $theLoai->fill([
            'Ten'=>$request->input('TenTheLoai'),
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
