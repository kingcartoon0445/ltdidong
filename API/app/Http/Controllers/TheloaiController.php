<?php

namespace App\Http\Controllers;

use App\Models\theloai;
use App\Http\Requests\StoretheloaiRequest;
use App\Http\Requests\UpdatetheloaiRequest;

class TheloaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  \App\Http\Requests\StoretheloaiRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoretheloaiRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\theloai  $theloai
     * @return \Illuminate\Http\Response
     */
    public function show(theloai $theloai)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\theloai  $theloai
     * @return \Illuminate\Http\Response
     */
    public function edit(theloai $theloai)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatetheloaiRequest  $request
     * @param  \App\Models\theloai  $theloai
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatetheloaiRequest $request, theloai $theloai)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\theloai  $theloai
     * @return \Illuminate\Http\Response
     */
    public function destroy(theloai $theloai)
    {
        //
    }
}