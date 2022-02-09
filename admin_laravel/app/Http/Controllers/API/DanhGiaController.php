<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Models\DanhGia;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDanhGiaRequest;
use App\Http\Requests\UpdateDanhGiaRequest;

class DanhGiaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(DanhGia::all());
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
     * @param  \App\Http\Requests\StoreDanhGiaRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data=$request->validate([
            'MaNguoiDung' => 'required',
            'MaDiaDanh'=> 'required',
            'SoDanhGia'=> 'required',
        ]);
        //
      $danhGia =DanhGia::create([
          'MaNguoiDung'=>$data['MaNguoiDung'],
          'MaDiaDanh'=>$data['MaDiaDanh'],
          'SoDanhGia'=>$data['SoDanhGia'],                
      ]);
      $response= [
          'data'=>$danhGia
      ];
      return true;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DanhGia  $danhGia
     * @return \Illuminate\Http\Response
     */
    public function show(int $danhGia)
    {
        //
        return DanhGia::where('MaDiaDanh',$danhGia)->avg('SoDanhGia');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DanhGia  $danhGia
     * @return \Illuminate\Http\Response
     */
    public function edit(DanhGia $danhGia)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDanhGiaRequest  $request
     * @param  \App\Models\DanhGia  $danhGia    
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $danhGia)
    {
        //
        
            $data=$request->validate([
                'MaNguoiDung' => 'required',
                'MaDiaDanh'=> 'required',
                'SoDanhGia'=> 'required',
            ]);try{
            $anhBaiViet=DanhGia::where('MaNguoiDung',$data['MaNguoiDung'])->where('MaDiaDanh',$data['MaDiaDanh'])->
                update([
                    'SoDanhGia' => $data['SoDanhGia'],  
                ]);
                $response= [
                    'data'=>$anhBaiViet
                ];
                return true;
        }catch(e){
            return false;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DanhGia  $danhGia
     * @return \Illuminate\Http\Response
     */
    public function destroy(DanhGia $danhGia)
    {
        //
    }
}
