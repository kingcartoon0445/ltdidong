<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NguoiDung;
use App\Http\Requests\StoreNguoiDungRequest;
use App\Http\Requests\UpdateNguoiDungRequest;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class NguoiDungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(NguoiDung::all());
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
     * @param  \App\Http\Requests\StoreNguoiDungRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data=$request->validate([
            'HovaTen' => 'required',
            'Email' => 'required',
            'SDT' => 'required',
            'AnhNen' =>'max:5000',
            'MatKhau' => 'required',
        ]);
        //
        /*$file = $request->file('AnhNen');  //ten input : image
        $name = $file->getClientOriginalName();  // get name image
        $max=  (string)(NguoiDung::max('id')+1);
        $nameKhongTrung=date('Y_m_d_H_i_s_').$max.substr($name,-4);
       // $nameKhongTrung =  date('Y_m_d_H_i_s_').$name;  // đặt tên không trùng Y_m_d_H_i_s_ + name.png
        $file->move('upload/anhNen', $nameKhongTrung);*/
      $nguoiDung=new NguoiDung;
      $nguoiDung ->fill([
          'TenDaiDien'=>$data['HovaTen'],
          'HovaTen'=>$data['HovaTen'],
          'Email'=>$data['Email'],
          'SDT'=>$data['SDT'],
          'AnhNen'=>'avt.png',
          'MatKhau'=>$data['MatKhau']
      ]);
      $nguoiDung->save();
      if($request->hasFile('AnhNen')){
        $nguoiDung->AnhNen = $request->file('AnhNen')->store('images/nguoidung/'.$nguoiDung->id, 'public');
    }

    $nguoiDung->save();
      return true;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NguoiDung  $nguoiDung
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //
        $nguoidung=NguoiDung::where('id',$id)->first();
        if(Storage::disk('public')->exists($nguoidung->AnhNen)){
            $nguoidung->AnhNen = Storage::url($nguoidung->AnhNen);
        }
        else{
            $nguoidung->AnhNen = Storage::url('images/no_image_holder.png');
        }
     return response()->json([$nguoidung], 200);;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NguoiDung  $nguoiDung
     * @return \Illuminate\Http\Response
     */
    public function edit(NguoiDung $nguoiDung)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNguoiDungRequest  $request
     * @param  \App\Models\NguoiDung  $nguoiDung
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $nguoiDung)
    {
        //
        $request->validate([
            'TenDaiDien' => 'required|string',
            'HoTen' => 'required|string',
            'Email' => 'required|email|unique:nguoi_dungs,Email,'.$nguoiDung->id,
            'SDT' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'hinh' => 'max:5000',
        ],[
            'TenDaiDien.required' => 'Vui lòng nhập tên đại diện',
            'HoTen.required' => 'Vui lòng nhập họ tên',
            'Email.required' => 'Vui lòng nhập email',
            'MatKhau.required' => 'Vui lòng nhập mật khẩu',
            'hinh.max' => 'Tối đa 5 MB',
        ]);
        
        try{
            if($request->hasFile('hinh')){
                $nguoiDung->AnhNen = $request->file('hinh')->store('images/nguoidung/'.$nguoiDung->id, 'public');
            }

            $nguoiDung->fill([
                'TenDaiDien'=>$request->input('TenDaiDien'),
                'HovaTen'=>$request->input('HoTen'),
                'Email'=>$request->input('Email'),
                'SDT'=>$request->input('SDT'),
                'TrangThai'=>$request->input('TrangThai'),
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
        //
    }
}
