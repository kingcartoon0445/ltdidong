<?php

namespace App\Http\Controllers;

use App\Models\AnhBaiViet;
use App\Http\Requests\StoreAnhBaiVietRequest;
use App\Http\Requests\UpdateAnhBaiVietRequest;

class AnhBaiVietController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(AnhBaiViet::all());
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
     * @param  \App\Http\Requests\StoreAnhBaiVietRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAnhBaiVietRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AnhBaiViet  $anhBaiViet
     * @return \Illuminate\Http\Response
     */
    public function show(int $anhBaiViet)
    {
        //
        return BaiViet::where('MaBaiViet',$anhBaiViet)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AnhBaiViet  $anhBaiViet
     * @return \Illuminate\Http\Response
     */
    public function edit(AnhBaiViet $anhBaiViet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAnhBaiVietRequest  $request
     * @param  \App\Models\AnhBaiViet  $anhBaiViet
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAnhBaiVietRequest $request, AnhBaiViet $anhBaiViet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnhBaiViet  $anhBaiViet
     * @return \Illuminate\Http\Response
     */
    public function destroy(AnhBaiViet $anhBaiViet)
    {
        //
    }
}
