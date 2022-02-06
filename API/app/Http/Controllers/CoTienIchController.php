<?php

namespace App\Http\Controllers;

use App\Models\CoTienIch;
use App\Http\Requests\StoreCoTienIchRequest;
use App\Http\Requests\UpdateCoTienIchRequest;

class CoTienIchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(CoTienIch::all());
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
     * @param  \App\Http\Requests\StoreCoTienIchRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try{
        $data=$request->validate([
            'MaDiaDanh' => 'required',
            'MaTienIch'=> 'required',
        ]);
        //
      $coTienIch =CoTienIch::create([
          'MaTienIch'=>$data['MaTienIch'],
          'MaDiaDanh'=>$data['MaDiaDanh'],              
      ]);
      $response= [
          'data'=>$coTienIch
      ];
      return true;}
      catch(e){
          return false;
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CoTienIch  $coTienIch
     * @return \Illuminate\Http\Response
     */
    public function show(int $MaTienIch)
    {
        
        return CoTienIch:: join('tien_iches','MaTienIch','=','tien_iches.id')->join('dia_danhs','MaDiaDanh','=','dia_danhs.id')->where('MaTienIch',$MaTienIch)->select('dia_danhs.id','dia_danhs.Ten','dia_danhs.Kinhdo','dia_danhs.Vido','dia_danhs.DiaChi','dia_danhs.MoTa','dia_danhs.AnhBia')->get();
    }
    public function show1(int $MaDiaDanh)
    {
        
        return CoTienIch:: join('tien_iches','MaTienIch','=','tien_iches.id')->join('dia_danhs','MaDiaDanh','=','dia_danhs.id')->where('MaDiaDanh',$MaDiaDanh)->where('tien_iches.Loai','1')->select('tien_iches.id','tien_iches.Ten','tien_iches.Anh','tien_iches.Loai','tien_iches.DiaChi','tien_iches.MoTa','tien_iches.SDT')->get();
    }
    public function show2(int $MaDiaDanh )
    {
        
        return CoTienIch:: join('tien_iches','MaTienIch','=','tien_iches.id')->join('dia_danhs','MaDiaDanh','=','dia_danhs.id')->where('MaDiaDanh',$MaDiaDanh)->where('tien_iches.Loai','2')->select('tien_iches.id','tien_iches.Ten','tien_iches.Anh','tien_iches.Loai','tien_iches.DiaChi','tien_iches.MoTa','tien_iches.SDT')->get();
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CoTienIch  $coTienIch
     * @return \Illuminate\Http\Response
     */
    public function edit(CoTienIch $coTienIch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCoTienIchRequest  $request
     * @param  \App\Models\CoTienIch  $coTienIch
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCoTienIchRequest $request, CoTienIch $coTienIch)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CoTienIch  $coTienIch
     * @return \Illuminate\Http\Response
     */
    public function destroy(CoTienIch $coTienIch)
    {
        //
    }
}
