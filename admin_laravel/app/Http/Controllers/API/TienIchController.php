<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\CoTienIch;
use App\Models\TienIch;
use App\Models\NguoiDung;
use App\Models\DiaDanh;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use DB;

class TienIchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listTienIch = TienIch::all();
        
        foreach($listTienIch as $tienIch){
            if(Storage::disk('public')->exists($tienIch->Anh)){
                $tienIch->Anh = Storage::url($tienIch->Anh);
            }
            else{
                $tienIch->Anh = Storage::url('images/no_image_holder.png');
            }
        }

        return response()->json($listTienIch, 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tienIch = TienIch::find($id);
        
        if(Storage::disk('public')->exists($tienIch->Anh)){
            $tienIch->Anh = Storage::url($tienIch->Anh);
        }
        else{
            $tienIch->Anh = Storage::url('images/no_image_holder.png');
        }

        return response()->json($tienIch, 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
