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
use App\Http\Controllers\TrashController;
use App\Http\Controllers\DeXuatController;

use App\Http\Controllers\API\AuthController;

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

Route::get('/reset-password/{token}', [AuthController::class, 'reset_view'])->name('reset_password_view');
Route::post('/reset-password/{token}', [AuthController::class, 'reset'])->name('reset-password');

Route::get('/success', function(){
    return view('mail.success');
});

Route::group(['middleware'=>'auth.custom'], function(){
    Route::get('/', [LoginController::class, 'index']);
    Route::resource('diaDanh', DiaDanhController::class);
    Route::resource('mien', MienController::class);
    Route::resource('theLoai', TheLoaiController::class);
    Route::resource('tienIch', TienIchController::class);
    Route::resource('baiViet', BaiVietController::class);
    Route::resource('nguoiDung', NguoiDungController::class);

    Route::resource('anhDiaDanh', AnhDiaDanhController::class);
    Route::resource('anhBaiViet', AnhBaiVietController::class);

    Route::get('rac/mien', [TrashController::class, 'mienIndex'])->name('mienIndex');
    Route::patch('rac/mien/{id}', [TrashController::class, 'mienEdit'])->name('mienEdit');

    Route::get('rac/theLoai', [TrashController::class, 'theLoaiIndex'])->name('theLoaiIndex');
    Route::patch('rac/theLoai/{id}', [TrashController::class, 'theLoaiEdit'])->name('theLoaiEdit');

    Route::get('rac/nguoiDung', [TrashController::class, 'nguoiDungIndex'])->name('nguoiDungIndex');
    Route::patch('rac/nguoiDung/{id}', [TrashController::class, 'nguoiDungEdit'])->name('nguoiDungEdit');

    Route::get('rac/tienIch', [TrashController::class, 'tienIchIndex'])->name('tienIchIndex');
    Route::patch('rac/tienIch/{id}', [TrashController::class, 'tienIchEdit'])->name('tienIchEdit');

    Route::get('rac/diaDanh', [TrashController::class, 'diaDanhIndex'])->name('diaDanhIndex');
    Route::patch('rac/diaDanh/{id}', [TrashController::class, 'diaDanhEdit'])->name('diaDanhEdit');

    Route::get('rac/baiViet', [TrashController::class, 'baiVietIndex'])->name('baiVietIndex');
    Route::patch('rac/baiViet/{id}', [TrashController::class, 'baiVietEdit'])->name('baiVietEdit');

    Route::resource('deXuat', DeXuatController::class);
});