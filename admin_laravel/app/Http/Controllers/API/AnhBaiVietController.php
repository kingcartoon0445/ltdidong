<?php


namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\BaiViet;
use App\Models\Like;
use App\Models\DiaDanh;
use App\Models\DanhGia;
use App\Models\NguoiDung;
use App\Models\Mien;
use App\Models\AnhDiaDanh;
use App\Models\AnhBaiViet;
use App\Models\TheLoai;
use App\Models\ThuocTheLoai;

use Illuminate\Support\Facades\Storage;
    use DB;
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
    public function store(Request $request)
    {
        $anhBaiViet = new AnhBaiViet;
        $request->validate([
            'MaBaiViet' => 'required',
            'images' => 'max:5000',
        ],[
            'MaBaiViet.required' => 'Vui lòng nhập tiêu đề',
            'images.max' => 'Tối đa 5 MB',
        ]);
        if($request->hasFile('images')){
            $files = $request->file('images');

            foreach($files as $file){   
                $anhBaiViet->fill([
                    'MaBaiViet'=>$request->input('MaBaiViet'),
                    'Anh'=>$file->store('images/baiviet/'.$request->input('MaBaiViet'), 'public'),
                ]);
                $anhBaiViet->save();
            }
        }
        
        return response()->json([$anhBaiViet]);
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
        return AnhBaiViet::where('MaBaiViet',$anhBaiViet)->get();
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
    public function update(int $id,Request $request)
    {
        //
            try{
                $data=$request->validate([
                    'Anh'=> 'required', 
                ]);
                $anhBaiViet=AnhBaiViet::where('id', $id)->
                    update(['Anh' => $data['Anh']]);
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
     * @param  \App\Models\AnhBaiViet  $anhBaiViet
     * @return \Illuminate\Http\Response
     */
    public function destroy(AnhBaiViet $anhBaiViet)
    {
        //
    }
}
