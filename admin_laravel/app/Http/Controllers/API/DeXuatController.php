<?php

namespace App\Http\Controllers\API;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DeXuat;
use App\Models\DiaDanh;
use App\Http\Requests\StoreDeXuatRequest;
use App\Http\Requests\UpdateDeXuatRequest;
use Carbon\Carbon;

class DeXuatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return response()->json(DeXuat::all());
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
     * @param  \App\Http\Requests\StoreDeXuatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'TenDiaDanh' => 'required',
            'MaMien' => 'required',
            'KinhDo' => 'required',
            'ViDo' => 'required',
            'DiaChi' => 'required',
            'MaNguoiDung' => 'required',
        ],[
            'TenDiaDanh.required' => 'Vui lòng nhập tên địa danh',
            'MaMien.required' => 'Vui lòng chọn miền',
            'KinhDo.required' => 'Vui lòng nhập kinh độ',
            'ViDo.required' => 'Vui lòng nhập vĩ độ',
            'DiaChi.required' => 'Vui lòng nhập địa chỉ',
            'MaNguoiDung.required' => 'Vui lòng chọn người đăng',
        ]);

        $diaDanh = DiaDanh::create([
            'Ten' => $data['TenDiaDanh'],
            'MaMien' => $data['MaMien'],
            'KinhDo' => $data['KinhDo'],
            'ViDo' => $data['ViDo'],
            'MoTa' => '',
            'DiaChi' => $data['DiaChi'],
            'AnhBia' => '',
            'TrangThai' => 3,
        ]);

        $deXuat = DeXuat::create([
            'MaNguoiDung' => $data['MaNguoiDung'],
            'MaDiaDanh' => $diaDanh->id,
            'TrangThai' => 0,
        ]);

        return response()->json($deXuat, 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DeXuat  $deXuat
     * @return \Illuminate\Http\Response
     */
    public function show(DeXuat $deXuat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DeXuat  $deXuat
     * @return \Illuminate\Http\Response
     */
    public function edit(DeXuat $deXuat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateDeXuatRequest  $request
     * @param  \App\Models\DeXuat  $deXuat
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDeXuatRequest $request, DeXuat $deXuat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DeXuat  $deXuat
     * @return \Illuminate\Http\Response
     */
    public function destroy(DeXuat $deXuat)
    {
        //
    }
}
