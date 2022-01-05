<?php

namespace App\Http\Controllers;

use App\Models\DiaDanh;
use App\Http\Requests\StoreDiaDanhRequest;
use App\Http\Requests\UpdateDiaDanhRequest;

class DiaDanhController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(DiaDanh::all());
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
     * @param  \App\Http\Requests\StoreDiaDanhRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDiaDanhRequest $request)
    {
        //
        {
            $data=$request->validate([
                 'Ten' => 'required',
                 'MaMien'=> 'required',
                 'KinhDo'=> 'required',
                 'Vido'=> 'required',
                 'MoTa'=> 'required',
             ]);
             //
           $diaDanh =DiaDanh::create([
               'Ten'=>$data['Ten'],
               'MaMien'=>$data['MaMien'],
               'KinhDo'=>$data['KinhDo'],
               'Vido'=>$data['Vido'],    
               'MoTa'=>$data['MoTa'],                 
           ]);
           $response= [
               'data'=>$diaDanh
           ];
           return true;
         }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DiaDanh  $diaDanh
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //
        return DiaDanh::where('id',$id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DiaDanh  $diaDanh
     * @return \Illuminate\Http\Response
     */
    public function edit(DiaDanh $diaDanh)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DiaDanh  $diaDanh
     * @return \Illuminate\Http\Response
     */
    public function destroy(DiaDanh $diaDanh)
    {
        //
    }
}
