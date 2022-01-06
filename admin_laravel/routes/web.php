<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('index');

Route::get('/DanhSachBaiViet', function () {
    return view('ds_baiviet');
})->name('dsbv');

Route::get('/DanhSachDiaDanh', function () {
    return view('ds_diadanh');
})->name('dsdd');

Route::get('/DanhSachMien', function () {
    return view('ds_mien');
})->name('dsmien');

Route::get('/DanhSachUser', function () {
    return view('ds_taikhoan');
})->name('dsuser');

Route::get('/DanhSachAdmin', function () {
    return view('ds_taikhoanadmin');
})->name('dsadmin');

Route::get('/DanhSachTheLoai', function () {
    return view('ds_theloai');
})->name('dstheloai');

Route::get('/DanhSachTienich', function () {
    return view('ds_tienich');
})->name('dstienich');

Route::get('/Profile', function () {
    return view('admin_profile');
})->name('profile');