<?php

namespace App\Http\Controllers;

use App\Models\DiaDanh;
use App\Models\NguoiDung;
use App\Models\Mien;
use App\Models\AnhDiaDanh;

use App\Http\Requests\StoreDiaDanhRequest;
use App\Http\Requests\UpdateDiaDanhRequest;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

class DiaDanhController extends Controller
{
    protected function fixImageUser(NguoiDung $nguoiDung)
    {
        if(Storage::disk('public')->exists($nguoiDung->AnhNen)){
            $nguoiDung->AnhNen = Storage::url($nguoiDung->AnhNen);
        }
        else{
            $nguoiDung->AnhNen = Storage::url('images/no_image_holder.png');
        }
    }

    protected function fixImage(DiaDanh $diaDanh)
    {
        if(Storage::disk('public')->exists($diaDanh->AnhBia)){
            $diaDanh->AnhBia = Storage::url($diaDanh->AnhBia);
        }
        else{
            $diaDanh->AnhBia = Storage::url('images/no_image_holder.png');
        }
    }

    protected function fixImageChild(AnhDiaDanh $anhDiaDanh)
    {
        if(Storage::disk('public')->exists($anhDiaDanh->Anh)){
            $anhDiaDanh->Anh = Storage::url($anhDiaDanh->Anh);
        }
        else{
            $anhDiaDanh->Anh = Storage::url('images/no_image_holder.png');
        }
    }

    public function index()
    {
        $data = NguoiDung::where('id','=',session('LoggedUser'))->first();
        $this->fixImageUser($data);

        $listdiaDanh = DiaDanh::all();
        foreach ($listdiaDanh as $diaDanh) {
            $this->fixImage($diaDanh);
        }

        return view('diadanh.danhsach', [
            'listdiaDanh'=>$listdiaDanh,
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
        $data = NguoiDung::where('id','=',session('LoggedUser'))->first();
        $this->fixImageUser($data);

        $listMien = Mien::all();

        return view('diaDanh.them', [
            'LoggedUserInfo'=>$data,
            'listMien'=>$listMien
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDiaDanhRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDiaDanhRequest $request)
    {
        $request->validate([
            'Ten' => 'required',
            'MaMien' => 'required',
            'KinhDo' => 'required',
            'ViDo' => 'required',
            'MoTa' => 'required',
        ]);

        if($request->input('TrangThai') == 'Hoạt động')
            $trangthai = 1;
        else
            $trangthai = 0;

        $diaDanh = new DiaDanh;
        $diaDanh->fill([
            'Ten'=>$request->input('Ten'),
            'MaMien'=>$request->input('MaMien'),
            'KinhDo'=>$request->input('KinhDo'),
            'ViDo'=>$request->input('ViDo'),
            'MoTa'=>$request->input('MoTa'),
            'AnhBia'=>'',
            'TrangThai'=>$trangthai,
        ]);

        $diaDanh->save();

        if($request->hasFile('hinh')){
            $diaDanh->AnhBia = $request->file('hinh')->store('images/diadanh/'.$diaDanh->id.'/cover', 'public');

            if($request->hasFile('images')){
                $files = $request->file('images');

                foreach($files as $file){
                    $anhDiaDanh = new AnhDiaDanh;
                    $anhDiaDanh->fill([
                        'MaDiaDanh'=>$diaDanh->id,
                        'Anh'=>$file->store('images/diadanh/'.$diaDanh->id.'/images', 'public'),
                    ]);
                    $anhDiaDanh->save();
                }
            }
        }

        $diaDanh->save();

        return Redirect::route('diaDanh.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DiaDanh  $diaDanh
     * @return \Illuminate\Http\Response
     */
    public function show(DiaDanh $diaDanh)
    {
        $data = NguoiDung::where('id','=',session('LoggedUser'))->first();
        $this->fixImageUser($data);

        $this->fixImage($diaDanh);

        $listAnh = $diaDanh->anhDiaDanhs;
        
        foreach ($listAnh as $anh) {
            $this->fixImageChild($anh);
        }
        
        return view('diadanh.show', [
            'diaDanh'=>$diaDanh, 
            'LoggedUserInfo'=>$data,
            'listAnh'=>$listAnh
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DiaDanh  $diaDanh
     * @return \Illuminate\Http\Response
     */
    public function edit(DiaDanh $diaDanh)
    {
        $data = NguoiDung::where('id','=',session('LoggedUser'))->first();
        $this->fixImageUser($data);

        $this->fixImage($diaDanh);

        $listMien = Mien::all();

        return view('diadanh.sua', [
            'diaDanh'=>$diaDanh, 
            'listMien'=>$listMien,
            'LoggedUserInfo'=>$data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDiaDanhRequest  $request
     * @param  \App\Models\DiaDanh  $diaDanh
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDiaDanhRequest $request, DiaDanh $diaDanh)
    {
        $request->validate([
            'Ten' => 'required',
            'MaMien' => 'required',
            'KinhDo' => 'required',
            'ViDo' => 'required',
            'MoTa' => 'required',
        ]);

        if($request->input('TrangThai') == 'Hoạt động')
            $trangthai = 1;
        else
            $trangthai = 0;

        $diaDanh->fill([
            'Ten'=>$request->input('Ten'),
            'MaMien'=>$request->input('MaMien'),
            'KinhDo'=>$request->input('KinhDo'),
            'ViDo'=>$request->input('ViDo'),
            'MoTa'=>$request->input('MoTa'),
            'TrangThai'=>$trangthai,
        ]);

        $diaDanh->save();

        return Redirect::route('diaDanh.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DiaDanh  $diaDanh
     * @return \Illuminate\Http\Response
     */
    public function destroy(DiaDanh $diaDanh)
    {
        $diaDanh->delete();

        return Redirect::route('diaDanh.index');
    }
}
