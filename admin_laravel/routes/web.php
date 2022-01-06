<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MienController;
use App\Http\Controllers\NguoiDungController;
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


Route::get('/theloai/danhsach', function () {
    return view('theloai.danhsach');
});
Route::get('/theloai/them', function () {
    return view('theloai.them');
});
Route::get('/theloai/sua', function () {
    return view('theloai.sua');
});


Route::resource('mien', MienController::class);


Route::get('/tienich/danhsach', function () {
    return view('tienich.danhsach');
});
Route::get('/tienich/them', function () {
    return view('tienich.them');
});
Route::get('/tienich/sua', function () {
    return view('tienich.sua');
});


Route::resource('nguoidung', NguoiDungController::class);


Route::get('/nguoidung/admin/danhsach', function () {
    return view('nguoidung.admin.danhsach');
});
Route::get('/nguoidung/admin/them', function () {
    return view('nguoidung.admin.them');
});
Route::get('/nguoidung/admin/sua', function () {
    return view('nguoidung.admin.sua');
});


Route::get('/Profile', function () {
    return view('admin_profile');
})->name('profile');