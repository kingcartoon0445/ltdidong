<?php

namespace App\Http\Controllers;

use App\Models\CoTienIch;
use App\Models\TienIch;
use App\Models\NguoiDung;
use App\Models\DiaDanh;

use App\Http\Requests\StoreTienIchRequest;
use App\Http\Requests\UpdateTienIchRequest;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use DB;

class TienIchController extends Controller
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

    protected function fixImage(TienIch $tienIch)
    {
        if(Storage::disk('public')->exists($tienIch->Anh)){
            $tienIch->Anh = Storage::url($tienIch->Anh);
        }
        else{
            $tienIch->Anh = Storage::url('images/no_image_holder.png');
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
        $listDiaDanh = DiaDanh::all();
        $listCoTienIch = CoTienIch::all();

        $data = NguoiDung::where('id','=',session('LoggedUser'))->first();
        $this->fixImageUser($data);

        foreach($listTienIch as $tienIch) {
            $this->fixImage($tienIch);
        }

        return view('tienich.danhsach', [
            'listTienIch'=>$listTienIch,
            'listDiaDanh'=>$listDiaDanh,
            'listCoTienIch'=>$listCoTienIch,
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

        return view('tienich.them', ['LoggedUserInfo'=>$data]);
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
            'TenDaiDien' => 'required',
            'Loai' => 'required',
            'DiaChi' => 'required',
            'MoTa' => 'required',
            'SDT' => 'required',
            'hinh' => ['mimetypes:image/*', 'max:5000'],
        ],[
            'TenDaiDien.required' => 'Vui lòng nhập tên đại diện',
            'Loai.required' => 'Vui lòng nhập loại',
            'DiaChi.required' => 'Vui lòng nhập địa chỉ',
            'MoTa.required' => 'Vui lòng nhập mô tả',
            'SDT.required' => 'Vui lòng nhập số điện thoại',
        ]);

        if($request->input('TrangThai') == 'Hoạt động')
            $trangthai = 1;
        else
            $trangthai = 0;

        $tienIch = new TienIch;
        $tienIch->fill([
            'Ten'=>$request->input('TenDaiDien'),
            'Loai'=>$request->input('Loai'),
            'DiaChi'=>$request->input('DiaChi'),
            'MoTa'=>$request->input('MoTa'),
            'SDT'=>$request->input('SDT'),
            'Anh'=>'',
            'TrangThai'=>$trangthai,
        ]);

        $tienIch->save();

        if($request->hasFile('hinh')){
            $tienIch->Anh = $request->file('hinh')->store('images/tienich/'.$tienIch->id, 'public');
            $tienIch->save();
        }

        if($request->has('MaDiaDanh')){
            $coTienIch = new CoTienIch;
            $coTienIch->fill([
                'MaDiaDanh'=>$request->input('MaDiaDanh'),
                'MaTienIch'=>$tienIch->id,
            ]);
            $coTienIch->save();
        }

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
        $data = NguoiDung::where('id','=',session('LoggedUser'))->first();
        $this->fixImageUser($data);

        $this->fixImage($tienIch);

        $diaDanh = DB::table('co_tien_iches')
                        ->join('tien_iches', 'co_tien_iches.MaTienIch', '=', 'tien_iches.id')
                        ->join('dia_danhs', 'co_tien_iches.MaDiaDanh', '=', 'dia_danhs.id')
                        ->where('co_tien_iches.MaTienIch', '=', $tienIch->id)
                        ->select('dia_danhs.*')
                        ->first();

        return view('tienich.show', [
            'tienIch'=>$tienIch,
            'diaDanh'=>$diaDanh,
            'LoggedUserInfo'=>$data,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TienIch  $tienIch
     * @return \Illuminate\Http\Response
     */
    public function edit(TienIch $tienIch)
    {
        $data = NguoiDung::where('id','=',session('LoggedUser'))->first();
        $this->fixImageUser($data);

        $this->fixImage($tienIch);

        return view('tienich.sua', [
            'tienIch'=>$tienIch,
            'LoggedUserInfo'=>$data
        ]);
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
            'TenDaiDien' => 'required',
            'Loai' => 'required',
            'DiaChi' => 'required',
            'MoTa' => 'required',
            'SDT' => 'required',
            'hinh' => ['mimetypes:image/*', 'max:5000'],
        ],[
            'TenDaiDien.required' => 'Vui lòng nhập tên đại diện',
            'Loai.required' => 'Vui lòng nhập loại',
            'DiaChi.required' => 'Vui lòng nhập địa chỉ',
            'MoTa.required' => 'Vui lòng nhập mô tả',
            'SDT.required' => 'Vui lòng nhập số điện thoại',
        ]);

        if($request->input('TrangThai') == 'Hoạt động')
            $trangthai = 1;
        else
            $trangthai = 0;

        if($request->hasFile('hinh')){
            $tienIch->Anh = $request->file('hinh')->store('images/tienich/'.$tienIch->id, 'public');
        }

        $tienIch->fill([
            'Ten'=>$request->input('TenDaiDien'),
            'Loai'=>$request->input('Loai'),
            'DiaChi'=>$request->input('DiaChi'),
            'MoTa'=>$request->input('MoTa'),
            'SDT'=>$request->input('SDT'),
            'TrangThai'=>$trangthai,
        ]);

        $tienIch->save();

        if($request->has('MaDiaDanh')){
            CoTienIch::where('MaTienIch','=',$tienIch->id)->delete();

            $coTienIch = new CoTienIch;
            $coTienIch->fill([
                'MaDiaDanh'=>$request->input('MaDiaDanh'),
                'MaTienIch'=>$tienIch->id,
            ]);
            $coTienIch->save();
        }

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
