<?php

namespace App\Http\Controllers;

use App\Models\Mien;
use App\Http\Requests\StoreMienRequest;
use App\Http\Requests\UpdateMienRequest;
use Illuminate\Http\Request;
use Illuminate\Routing;

class MienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(Mien::all());
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
     * @param  \App\Http\Requests\StoreMienRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $data=$request->validate([
            'TenMien' => 'required',
        ]);
        //
      $mien =Mien::create([
          'TenMien'=>$data['TenMien']
      ]);
      $response= [
          'data'=>$mien
      ];
      return true;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mien  $mien
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //
        return Mien::where('id',$id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mien  $mien
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        //
        return "dsadsadsadsad";
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateMienRequest  $request
     * @param  \App\Models\Mien  $mien
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        
        return "false";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mien  $mien
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mien $mien)
    {
        //
    }
}
