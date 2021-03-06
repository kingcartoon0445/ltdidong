<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use App\Models\View;
use App\Http\Requests\StoreViewRequest;
use App\Http\Requests\UpdateViewRequest;
use Illuminate\Http\Request;

class ViewController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(View::all());
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
     * @param  \App\Http\Requests\StoreViewRequest  $request
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
      $view =View::create([
          'MaNguoiDung'=>$data['MaNguoiDung'],
          'MaBaiViet'=>$data['MaBaiViet']
      ]);
      $response= [
          'data'=>$view
      ];
      return true;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\View  $view
     * @return \Illuminate\Http\Response
     */
    public function show(int $view)
    {
        //
        return['view'=> View::where('MaBaiViet',$view)->count()];
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\View  $view
     * @return \Illuminate\Http\Response
     */
    public function edit(View $view)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateViewRequest  $request
     * @param  \App\Models\View  $view
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateViewRequest $request, View $view)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\View  $view
     * @return \Illuminate\Http\Response
     */
    public function destroy(View $view)
    {
        //
    }

    public function KtraView(Request $request)
    {
        $request->validate([
            'MaBV' => 'required',
            'MaND'=>'required'
        ]);
        $view=View::where('MaNguoiDung',$request->MaND)->where('MaBaiViet',$request->MaBV)->get();
        $view2=View::where('MaNguoiDung','0')->where('MaBaiViet','0')->get();
        if($view!=$view2)
        return ['coview'=>'1'];else return ['coview'=>'0'];
    }  
}
