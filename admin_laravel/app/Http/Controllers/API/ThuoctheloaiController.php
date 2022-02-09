<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\thuoctheloai;
use App\Http\Requests\StorethuoctheloaiRequest;
use App\Http\Requests\UpdatethuoctheloaiRequest;

class ThuoctheloaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(Thuoctheloai::all());
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
     * @param  \App\Http\Requests\StorethuoctheloaiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data=$request->validate([
            'MaTheLoai' => 'required',
            'MaDiaDanh'=> 'required',
        ]);
        //
      $thuoctheloai =thuoctheloai::create([
          'MaTheLoai'=>$data['MaTheLoai'],
          'MaDiaDanh'=>$data['MaDiaDanh'],
          
      ]);
      $response= [
          'data'=>$thuoctheloai
      ];
      return true;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\thuoctheloai  $thuoctheloai
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //
        return ThuocTheloai::where('MaTheLoai',$id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\thuoctheloai  $thuoctheloai
     * @return \Illuminate\Http\Response
     */
    public function edit(thuoctheloai $thuoctheloai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatethuoctheloaiRequest  $request
     * @param  \App\Models\thuoctheloai  $thuoctheloai
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatethuoctheloaiRequest $request, thuoctheloai $thuoctheloai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\thuoctheloai  $thuoctheloai
     * @return \Illuminate\Http\Response
     */
    public function destroy(thuoctheloai $thuoctheloai)
    {
        //
    }
}
