<?php

namespace App\Http\Controllers\API;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\NguoiDung;
use App\Http\Requests\StoreNguoiDungRequest;
use App\Http\Requests\UpdateNguoiDungRequest;
use Illuminate\Support\Facades\File;

class NguoiDungController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(NguoiDung::all());
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
     * @param  \App\Http\Requests\StoreNguoiDungRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data=$request->validate([
            'HovaTen' => 'required',
            'Email' => 'required',
            'SDT' => 'required',
            //'AnhNen' => 'file',
            'MatKhau' => 'required',
        ]);
        //
        /*$file = $request->file('AnhNen');  //ten input : image
        $name = $file->getClientOriginalName();  // get name image
        $max=  (string)(NguoiDung::max('id')+1);
        $nameKhongTrung=date('Y_m_d_H_i_s_').$max.substr($name,-4);
       // $nameKhongTrung =  date('Y_m_d_H_i_s_').$name;  // đặt tên không trùng Y_m_d_H_i_s_ + name.png
        $file->move('upload/anhNen', $nameKhongTrung);*/

      $nguoiDung =NguoiDung::create([
          'TenDaiDien'=>$data['HovaTen'],
          'HovaTen'=>$data['HovaTen'],
          'Email'=>$data['Email'],
          'SDT'=>$data['SDT'],
          'AnhNen'=>'avt.png',
          'MatKhau'=>$data['MatKhau']
      ]);
      $response= [
          'data'=>$nguoiDung
      ];
      return true;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NguoiDung  $nguoiDung
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //
     return NguoiDung::where('id',$id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NguoiDung  $nguoiDung
     * @return \Illuminate\Http\Response
     */
    public function edit(NguoiDung $nguoiDung)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateNguoiDungRequest  $request
     * @param  \App\Models\NguoiDung  $nguoiDung
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $nguoiDung)
    {
        //
        $data=$request->validate([
            'HovaTen' => 'required',
            'TenDaiDien'=> 'required',
            'Email'=> 'required',
            'SDT'=> 'required',
            'AnhNen'=> 'required',
        ]);try{

            $user=NguoiDung::where('id', $nguoiDung)->first();
            if($user != null){
                File::delete(public_path("upload/anhNen/".$user['AnhNen']));
                $file = $request->file('AnhNen');  //ten input : image
                $name = $file->getClientOriginalName();  // get name image
                $nameKhongTrung= date('Y_m_d_H_i_s_').$nguoiDung.substr($name,-4);
                // $nameKhongTrung =  date('Y_m_d_H_i_s_').$name;  // đặt tên không trùng Y_m_d_H_i_s_ + name.png
                $file->move('upload/anhNen', $nameKhongTrung);
            }
        $NguoiDung=NguoiDung::where('id', $nguoiDung)->
            update([
                'HovaTen' => $data['HovaTen'],  
                'TenDaiDien' => $data['TenDaiDien'], 
                'Email' => $data['Email'], 
                'SDT' => $data['SDT'], 
                'AnhNen' => $nameKhongTrung, 
            ]);
            $response= [
                'data'=>$NguoiDung
            ];
            return true;
    }catch(e){
        return false;
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NguoiDung  $nguoiDung
     * @return \Illuminate\Http\Response
     */
    public function destroy(NguoiDung $nguoiDung)
    {
        //
    }
}
