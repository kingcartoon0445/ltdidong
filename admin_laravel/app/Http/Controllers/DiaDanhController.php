<?php

namespace App\Http\Controllers;

use App\Models\DiaDanh;
use App\Models\NguoiDung;
use App\Models\Mien;
use App\Models\AnhDiaDanh;
use App\Models\TheLoai;
use App\Models\ThuocTheLoai;
use App\Models\DanhGia;

use App\Http\Requests\StoreDiaDanhRequest;
use App\Http\Requests\UpdateDiaDanhRequest;

use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use DB;

class DiaDanhController extends Controller
{
    protected function fixImage_NguoiDung(NguoiDung $nguoiDung){
        if(Storage::disk('public')->exists($nguoiDung->AnhNen)){
            $nguoiDung->AnhNen = Storage::url($nguoiDung->AnhNen);
        }
        else{
            $nguoiDung->AnhNen = Storage::url('images/no_image_holder.png');
        }
    }

    protected function fixImage_DiaDanh(DiaDanh $diaDanh){
        if(Storage::disk('public')->exists($diaDanh->AnhBia)){
            $diaDanh->AnhBia = Storage::url($diaDanh->AnhBia);
        }
        else{
            $diaDanh->AnhBia = Storage::url('images/no_image_holder.png');
        }
    }

    protected function fixImage_AnhDiaDanh(AnhDiaDanh $anhDiaDanh){
        if(Storage::disk('public')->exists($anhDiaDanh->Anh)){
            $anhDiaDanh->Anh = Storage::url($anhDiaDanh->Anh);
        }
        else{
            $anhDiaDanh->Anh = Storage::url('images/no_image_holder.png');
        }
    }

    public function index(){
        $data = NguoiDung::where('id','=',session('LoggedUser'))->first();
        $this->fixImage_NguoiDung($data);

        $listdiaDanh = DiaDanh::where('TrangThai', 1)->orWhere('TrangThai', 0)->orWhere('TrangThai', 2)->get();
        foreach ($listdiaDanh as $diaDanh) {
            $this->fixImage_DiaDanh($diaDanh);
        }

        return view('diadanh.danhsach', [
            'listdiaDanh'=>$listdiaDanh,
            'LoggedUserInfo'=>$data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(){
        $data = NguoiDung::where('id','=',session('LoggedUser'))->first();
        $this->fixImage_NguoiDung($data);

        $listMien = Mien::all();
        $listTheLoai = TheLoai::all();

        return view('diadanh.them', [
            'LoggedUserInfo'=>$data,
            'listMien'=>$listMien,
            'listTheLoai'=>$listTheLoai,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreDiaDanhRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDiaDanhRequest $request){        
        $request->validate([
            'Ten' => 'required',
            'MaMien' => 'required',
            'KinhDo' => 'required',
            'ViDo' => 'required',
            'DiaChi' => 'required',
            'MoTa' => 'required',
            'theloais' => 'required',
            'hinh' => 'max:5000',
        ],[
            'Ten.required' => 'Vui l??ng nh???p t??n ?????a danh',
            'MaMien.required' => 'Vui l??ng ch???n mi???n',
            'KinhDo.required' => 'Vui l??ng nh???p kinh ?????',
            'ViDo.required' => 'Vui l??ng nh???p v?? ?????',
            'DiaChi.required' => 'Vui l??ng nh???p ?????a ch???',
            'MoTa.required' => 'Vui l??ng nh???p m?? t???',
            'theloais.required' => 'Vui l??ng ch???n th??? lo???i',
            'hinh.max' => 'T???i ??a 5 MB',
        ]);

        $diaDanh = new DiaDanh;
        $diaDanh->fill([
            'Ten'=>$request->input('Ten'),
            'MaMien'=>$request->input('MaMien'),
            'KinhDo'=>$request->input('KinhDo'),
            'ViDo'=>$request->input('ViDo'),
            'MoTa'=>$request->input('MoTa'),
            'DiaChi'=>$request->input('DiaChi'),
            'AnhBia'=>'',
            'TrangThai'=>$request->input('TrangThai'),
        ]);

        $diaDanh->save();

        if($request->hasFile('hinh')){
            $diaDanh->AnhBia = $request->file('hinh')->store('images/diadanh/'.$diaDanh->id.'/cover', 'public');
        }

        if($request->hasFile('images')){
            $files = $request->file('images');

            foreach($files as $file){
                $anhDiaDanh = new AnhDiaDanh;
                $anhDiaDanh->fill([
                    'MaDiaDanh'=>$diaDanh->id,
                    'Anh'=>$file->store('images/diadanh/'.$diaDanh->id.'/images', 'public'),
                ]);
                $anhDiaDanh->save();
            }
        }
        
        $diaDanh->save();

        if($request->has('theloais')){
            foreach($request->input('theloais') as $theLoai){
                $thuocTheLoai = new ThuocTheLoai;
                $thuocTheLoai->fill([
                    'MaTheLoai'=>$theLoai,
                    'MaDiaDanh'=>$diaDanh->id,
                ]);
                
                $thuocTheLoai->save();
            }
        }

        return Redirect::route('diaDanh.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DiaDanh  $diaDanh
     * @return \Illuminate\Http\Response
     */
    public function show(DiaDanh $diaDanh){
        $this->fixImage_DiaDanh($diaDanh);

        $data = NguoiDung::where('id','=',session('LoggedUser'))->first();
        $this->fixImage_NguoiDung($data);

        $listAnh = $diaDanh->anhDiaDanhs;
        foreach ($listAnh as $anh) {
            $this->fixImage_AnhDiaDanh($anh);
        }
        
        $listTheLoai = DB::table('the_loais')
                            ->join('thuoc_the_loais', 'thuoc_the_loais.MaTheLoai', '=', 'the_loais.id')
                            ->where('thuoc_the_loais.MaDiaDanh', '=', $diaDanh->id)
                            ->select('the_loais.*')
                            ->get();

        $totalReview = $diaDanh->danhGias->count();
        $avg_stars = $diaDanh->danhGias->avg('SoDanhGia');

        return view('diadanh.show', [
            'diaDanh'=>$diaDanh, 
            'LoggedUserInfo'=>$data,
            'listAnh'=>$listAnh,
            'listTheLoai'=>$listTheLoai,
            'totalReview'=>$totalReview,
            'avg_stars'=>$avg_stars,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DiaDanh  $diaDanh
     * @return \Illuminate\Http\Response
     */
    public function edit(DiaDanh $diaDanh){
        $this->fixImage_DiaDanh($diaDanh);

        $data = NguoiDung::where('id','=',session('LoggedUser'))->first();
        $this->fixImage_NguoiDung($data);

        $listMien = Mien::all();

        $listAnh = $diaDanh->anhDiaDanhs;
        foreach ($listAnh as $anh) {
            $this->fixImage_AnhDiaDanh($anh);
        }
        
        $listTheLoai = TheLoai::all();
        $selectedListTheLoai = $diaDanh->thuocTheLoais;

        return view('diadanh.sua', [
            'diaDanh'=>$diaDanh, 
            'listMien'=>$listMien,
            'LoggedUserInfo'=>$data,
            'listAnh'=>$listAnh,
            'listTheLoai'=>$listTheLoai,
            'selectedListTheLoai'=>$selectedListTheLoai,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDiaDanhRequest  $request
     * @param  \App\Models\DiaDanh  $diaDanh
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDiaDanhRequest $request, DiaDanh $diaDanh){
        $request->validate([
            'Ten' => 'required',
            'MaMien' => 'required',
            'KinhDo' => 'required',
            'ViDo' => 'required',
            'DiaChi' => 'required',
            'MoTa' => 'required',
            'hinh' => 'max:5000',
        ],[
            'Ten.required' => 'Vui l??ng nh???p t??n ?????a danh',
            'MaMien.required' => 'Vui l??ng ch???n mi???n',
            'KinhDo.required' => 'Vui l??ng nh???p kinh ?????',
            'ViDo.required' => 'Vui l??ng nh???p v?? ?????',
            'DiaChi.required' => 'Vui l??ng nh???p ?????a ch???',
            'MoTa.required' => 'Vui l??ng nh???p m?? t???',
            'hinh.max' => 'T???i ??a 5 MB',
        ]);

        if($request->hasFile('hinh')){
            $diaDanh->AnhBia = $request->file('hinh')->store('images/diadanh/'.$diaDanh->id.'/cover', 'public');
        }

        if($request->hasFile('images')){
            $files = $request->file('images');

            foreach($files as $file){
                $anhDiaDanh = new AnhDiaDanh;
                $anhDiaDanh->fill([
                    'MaDiaDanh'=>$diaDanh->id,
                    'Anh'=>$file->store('images/diadanh/'.$diaDanh->id.'/images', 'public'),
                ]);
                
                $anhDiaDanh->save();
            }
        }

        if($request->has('theloais')){
            DB::table('thuoc_the_loais')->where('MaDiaDanh', $diaDanh->id)->delete();

            foreach($request->input('theloais') as $theLoai){
                $thuocTheLoai = new ThuocTheLoai;
                $thuocTheLoai->fill([
                    'MaTheLoai'=>$theLoai,
                    'MaDiaDanh'=>$diaDanh->id,
                ]);
                
                $thuocTheLoai->save();
            }
        }
        
        $diaDanh->fill([
            'Ten'=>$request->input('Ten'),
            'MaMien'=>$request->input('MaMien'),
            'KinhDo'=>$request->input('KinhDo'),
            'ViDo'=>$request->input('ViDo'),
            'MoTa'=>$request->input('MoTa'),
            'DiaChi'=>$request->input('DiaChi'),
            'TrangThai'=>$request->input('TrangThai'),
        ]);
        
        $diaDanh->save();

        return Redirect::route('diaDanh.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DiaDanh  $diaDanh
     * @return \Illuminate\Http\Response
     */
    public function destroy(DiaDanh $diaDanh)
    {
        $diaDanh->delete();

        return Redirect::route('diaDanh.index');
    }
}
