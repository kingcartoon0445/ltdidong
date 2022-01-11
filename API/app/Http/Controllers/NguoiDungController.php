<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\NguoiDung;
use App\Http\Requests\StoreNguoiDungRequest;
use App\Http\Requests\UpdateNguoiDungRequest;

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
            'AnhNen' => 'required',
            'MatKhau' => 'required',
        ]);
        //
      $nguoiDung =NguoiDung::create([
          'TenDaiDien'=>$data['HovaTen'],
          'HovaTen'=>$data['HovaTen'],
          'Email'=>$data['Email'],
          'SDT'=>$data['SDT'],
          'AnhNen'=>$data['AnhNen'],
          'MatKhau'=>$data['MatKhau']
      ]);
      $response= [
          'data'=>$nguoiDung
      ];
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
     return NguoiDung::where('id',$id)->get();
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
        $data=$request->validate([
            'HovaTen' => 'required',
            'TenDaiDien'=> 'required',
            'Email'=> 'required',
            'SDT'=> 'required',
            'AnhNen'=> 'required',
        ]);try{
        $NguoiDung=NguoiDung::where('id', $nguoiDung)->
            update([
                'HovaTen' => $data['HovaTen'],  
                'TenDaiDien' => $data['TenDaiDien'], 
                'Email' => $data['Email'], 
                'SDT' => $data['SDT'], 
                'AnhNen' => $data['AnhNen'], 
            ]);
            $response= [
                'data'=>$NguoiDung
            ];
            return true;
    }catch(e){
        return false;
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
