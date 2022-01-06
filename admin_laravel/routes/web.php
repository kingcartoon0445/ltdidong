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
});


Route::get('/baiviet/danhsach', function () {
    return view('baiviet.danhsach');
});
Route::get('/baiviet/them', function () {
    return view('baiviet.them');
});
Route::get('/baiviet/sua', function () {
    return view('baiviet.sua');
});


Route::get('/diadanh/danhsach', function () {
    return view('diadanh.danhsach');
});
Route::get('/diadanh/them', function () {
    return view('diadanh.them');
});
Route::get('/diadanh/sua', function () {
    return view('diadanh.sua');
});


Route::get('/DanhSachMien', function () {
    return view('ds_mien', []);
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