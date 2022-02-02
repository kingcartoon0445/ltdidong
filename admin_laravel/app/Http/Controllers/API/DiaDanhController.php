<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\DiaDanh;
use App\Models\NguoiDung;
use App\Models\Mien;
use App\Models\AnhDiaDanh;
use App\Models\TheLoai;
use App\Models\ThuocTheLoai;

use Illuminate\Support\Facades\Storage;
use DB;

class DiaDanhController extends Controller
{
    protected function fixImage_DiaDanh(DiaDanh $diaDanh)
    {
        if(Storage::disk('public')->exists($diaDanh->AnhBia)){
            $diaDanh->AnhBia = Storage::url($diaDanh->AnhBia);
        }
        else{
            $diaDanh->AnhBia = Storage::url('images/no_image_holder.png');
        }
    }

    protected function fixImage_AnhDiaDanh(AnhDiaDanh $anhDiaDanh)
    {
        if(Storage::disk('public')->exists($anhDiaDanh->Anh)){
            $anhDiaDanh->Anh = Storage::url($anhDiaDanh->Anh);
        }
        else{
            $anhDiaDanh->Anh = Storage::url('images/no_image_holder.png');
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listDiaDanh = DiaDanh::all();
        $listTheLoai = DiaDanh::with('theLoais')->get();
        $listAnhDiaDanh = DiaDanh::with('anhDiaDanhs')->get();
        
        foreach ($listAnhDiaDanh as $diaDanh) {
            if ($diaDanh->AnhBia){
                if(Storage::disk('public')->exists($diaDanh->AnhBia)){
                    $diaDanh->AnhBia = Storage::url($diaDanh->AnhBia);
                }
                else{
                    $diaDanh->AnhBia = Storage::url('images/no_image_holder.png');
                }
            }
            
            if($diaDanh->Anh){
                if(Storage::disk('public')->exists($diaDanh->Anh)){
                    $diaDanh->Anh = Storage::url($diaDanh->Anh);
                }
                else{
                    $diaDanh->Anh = Storage::url('images/no_image_holder.png');
                }
            }
        }

        return response()->json($listAnhDiaDanh, 200);
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
        //
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
