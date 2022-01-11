<?php

namespace App\Http\Controllers;

use App\Models\AnhDiaDanh;
use App\Http\Requests\StoreAnhDiaDanhRequest;
use App\Http\Requests\UpdateAnhDiaDanhRequest;

class AnhDiaDanhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(AnhDiaDanh::all());
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
     * @param  \App\Http\Requests\StoreAnhDiaDanhRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        {
            //
            $data=$request->validate([
                'MaBaiViet' => 'required',
                'Anh'=> 'required',
                'TrangThai'=> 'required',
            ]);
            //
          $anhDiaDanh =AnhDiaDanh::create([
              'MaBaiViet'=>$data['MaBaiViet'],
              'Anh'=>$data['Anh'],
              'TrangThai'=>$data['TrangThai'],                 
          ]);
          $response= [
              'data'=>$anhDiaDanh
          ];
          return true;
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AnhDiaDanh  $anhDiaDanh
     * @return \Illuminate\Http\Response
     */
    public function show(AnhDiaDanh $anhDiaDanh)
    {
        //
        return BaiViet::where('MaDiaDanh',$anhDiaDanh)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AnhDiaDanh  $anhDiaDanh
     * @return \Illuminate\Http\Response
     */
    public function edit(AnhDiaDanh $anhDiaDanh)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAnhDiaDanhRequest  $request
     * @param  \App\Models\AnhDiaDanh  $anhDiaDanh
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAnhDiaDanhRequest $request, AnhDiaDanh $anhDiaDanh)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnhDiaDanh  $anhDiaDanh
     * @return \Illuminate\Http\Response
     */
    public function destroy(AnhDiaDanh $anhDiaDanh)
    {
        //
    }
}
