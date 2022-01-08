<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MienController;
use App\Http\Controllers\NguoiDungController;
use App\Http\Controllers\LoaiTaiKhoanController;
use App\Http\Controllers\TheLoaiController;
use App\Http\Controllers\TienIchController;
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

Route::resource('mien', MienController::class);
Route::resource('loaiTaiKhoan', LoaiTaiKhoanController::class);
Route::resource('nguoiDung', NguoiDungController::class);
Route::resource('theLoai', TheLoaiController::class);
Route::resource('tienIch', TienIchController::class);

Route::get('/Profile', function () {
    return view('admin_profile');
})->name('profile');