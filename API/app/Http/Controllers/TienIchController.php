<?php

namespace App\Http\Controllers;

use App\Models\TienIch;
use App\Http\Requests\StoreTienIchRequest;
use App\Http\Requests\UpdateTienIchRequest;

class TienIchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(TienIch::all());
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
     * @param  \App\Http\Requests\StoreTienIchRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTienIchRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TienIch  $tienIch
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //
        return TienIch::where('id',$id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TienIch  $tienIch
     * @return \Illuminate\Http\Response
     */
    public function edit(TienIch $tienIch)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TienIch  $tienIch
     * @return \Illuminate\Http\Response
     */
    public function destroy(TienIch $tienIch)
    {
        //
    }
}
