<?php

namespace App\Http\Controllers;

use App\Models\AnhDiaDanh;

use App\Http\Requests\StoreAnhDiaDanhRequest;
use App\Http\Requests\UpdateAnhDiaDanhRequest;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;

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
    public function store(StoreAnhDiaDanhRequest $request)
    {
        //
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
        if(Storage::disk('public')->exists($anhDiaDanh->Anh)){
            //Storage::disk('public')->delete($anhDiaDanh->Anh);
            $anhDiaDanh->delete();
        }

        return back();
    }
}
