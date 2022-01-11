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
        //
        return CoTienIch::where('MaTienIch',$MaTienIch)->get();
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
