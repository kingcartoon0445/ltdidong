<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\DeXuat;
use App\Http\Requests\StoreDeXuatRequest;
use App\Http\Requests\UpdateDeXuatRequest;

class DeXuatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(DeXuat::all());
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
     * @param  \App\Http\Requests\StoreDeXuatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data=$request->validate([
            'MaNguoiDung' => 'required',
            'MaDiaDanh' => 'required',
        ]);
        //
      $deXuat =DeXuat::create([
          'MaNguoiDung'=>$data['MaNguoiDung'],
          'MaDiaDanh'=>$data['MaDiaDanh']
      ]);
      $response= [
          'data'=>$deXuat
      ];
      return true;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DeXuat  $deXuat
     * @return \Illuminate\Http\Response
     */
    public function show(DeXuat $deXuat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DeXuat  $deXuat
     * @return \Illuminate\Http\Response
     */
    public function edit(DeXuat $deXuat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDeXuatRequest  $request
     * @param  \App\Models\DeXuat  $deXuat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDeXuatRequest $request, DeXuat $deXuat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DeXuat  $deXuat
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeXuat $deXuat)
    {
        //
    }
}
