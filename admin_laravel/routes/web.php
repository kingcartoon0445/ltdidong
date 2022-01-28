<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\LoginController;

use App\Http\Controllers\MienController;
use App\Http\Controllers\NguoiDungController;
use App\Http\Controllers\TheLoaiController;
use App\Http\Controllers\TienIchController;
use App\Http\Controllers\DiaDanhController;
use App\Http\Controllers\AnhDiaDanhController;
use App\Http\Controllers\BaiVietController;
use App\Http\Controllers\AnhBaiVietController;

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
Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register', [LoginController::class, 'save'])->name('save');

Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'check'])->name('check');

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::group(['middleware'=>'auth.custom'], function(){
    Route::get('/', [LoginController::class, 'index']);
    Route::resource('mien', MienController::class);
    Route::resource('nguoiDung', NguoiDungController::class);
    Route::resource('theLoai', TheLoaiController::class);
    Route::resource('tienIch', TienIchController::class);

    Route::resource('diaDanh', DiaDanhController::class);
    Route::resource('anhDiaDanh', AnhDiaDanhController::class);

    Route::resource('baiViet', BaiVietController::class);
    Route::resource('anhBaiViet', AnhBaiVietController::class);
});