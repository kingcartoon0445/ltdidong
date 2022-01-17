<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\BaiViet;
use App\Http\Requests\StoreBaiVietRequest;
use App\Http\Requests\UpdateBaiVietRequest;

class BaiVietController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(BaiViet::all());
    }
    public function BaiVietUS(int $id)
    {
        return BaiViet::where('MaNguoiDung',$id)->get();
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
     * @param  \App\Http\Requests\StoreBaiVietRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBaiVietRequest $request)
    {
        //
        $file = $request->file('AnhNen');  //ten input : image
        $name = $file->getClientOriginalName();  // get name image
        $max=  (string)(AnhBaiViet::max('id')+1);
        $nameKhongTrung=date('Y_m_d_H_i_s_').$max.substr($name,-4);
       // $nameKhongTrung =  date('Y_m_d_H_i_s_').$name;  // đặt tên không trùng Y_m_d_H_i_s_ + name.png
        $file->move('upload/anhBaiViet', $nameKhongTrung);
            $data=$request->validate([
                 'MaNguoiDung' => 'required',
                 'MaDiaDanh'=> 'required',
                 'TieuDe'=> 'required',
                 'NoiDung'=> 'required',
             ]);
             //
           $baiViet =BaiViet::create([
               'MaNguoiDung'=>$data['MaNguoiDung'],
               'MaDiaDanh'=>$data['MaDiaDanh'],
               'TieuDe'=>$data['TieuDe'],
               'NoiDung'=>$data['NoiDung'],               
           ]);
           $response= [
               'data'=>$baiViet
           ];
           return true;
         
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BaiViet  $baiViet
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //return BaiViet::join('anh_bai_viets','bai_viets.id','=','MaBaiViet')->where('bai_viets.id',$id)->get()
        return BaiViet::where('id',$id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BaiViet  $baiViet
     * @return \Illuminate\Http\Response
     */
    public function edit(BaiViet $baiViet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateBaiVietRequest  $request
     * @param  \App\Models\BaiViet  $baiViet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        //
        
            $data=$request->validate([
                'MaNguoiDung' => 'required',
                'MaDiaDanh'=> 'required',
                'TieuDe'=> 'required',
                'NoiDung'=> 'required',
            ]);try{
            $anhBaiViet=BaiViet::where('id', $id)->where('MaNguoiDung',$data['MaNguoiDung'])->
                update([
                    'MaDiaDanh' => $data['MaDiaDanh'],
                    'TieuDe' => $data['TieuDe'],
                    'NoiDung' => $data['NoiDung'],
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
     * @param  \App\Models\BaiViet  $baiViet
     * @return \Illuminate\Http\Response
     */
    public function destroy(BaiViet $baiViet)
    {
        //
    }
}




