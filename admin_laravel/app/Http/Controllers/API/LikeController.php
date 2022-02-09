<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\Like;
use Illuminate\Http\Request;
use App\Http\Requests\StoreLikeRequest;
use App\Http\Requests\UpdateLikeRequest;

class LikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(Like::all());
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
     * @param  \App\Http\Requests\StoreLikeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data=$request->validate([
            'MaNguoiDung' => 'required',
            'MaBaiViet' => 'required',
        ]);
        //
      $like =Like::create([
          'MaNguoiDung'=>$data['MaNguoiDung'],
          'MaBaiViet'=>$data['MaBaiViet']
      ]);
      $response= [
          'data'=>$like
      ];
      return true;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function show(int $like)
    {
        //
        return ['like'=> Like::where('MaBaiViet',$like)->count()];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function edit(Like $like)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLikeRequest  $request
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLikeRequest $request, Like $like)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Like  $like
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $requestn,int $a)
    {
        $data=$request->validate([
            'MaNguoiDung' => 'required',
            'MaBaiViet' => 'required',
        ]);
        //
        Like::where('MaNguoiDung',$data->MaNguoiDung)->where('MaBaiViet',$data->MaBaiViet)->delete();
        return true;
    }

    public function KtraLike(Request $request)
    {
        $request->validate([
            'MaBV' => 'required',
            'MaND'=>'required'
        ]);
        $like=Like::where('MaNguoiDung',$request->MaND)->where('MaBaiViet',$request->MaBV)->get();
        $like2=Like::where('MaNguoiDung','0')->where('MaBaiViet','0')->get();
        if($like!=$like2)
        return ['colike'=>'1'];else return ['colike'=>'0'];
    }
    
    public function XoaLike(Request $request)
    {
        $request->validate([
            'MaBV' => 'required',
            'MaND'=>'required'
        ]);
        $like=Like::where('MaNguoiDung',$request->MaND)->where('MaBaiViet',$request->MaBV)->delete();
        return true;
    }
}
