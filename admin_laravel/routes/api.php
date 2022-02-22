<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\AuthController;

use App\Http\Controllers\API\MienController;
use App\Http\Controllers\API\TheLoaiController;
use App\Http\Controllers\API\DiaDanhController;
use App\Http\Controllers\API\TienIchController;
use App\Http\Controllers\API\BaiVietController;
use App\Http\Controllers\API\ViewController;
use App\Http\Controllers\API\NguoiDungController;
use App\Http\Controllers\API\LikeController;
use App\Http\Controllers\API\CoTienIchController;
use App\Http\Controllers\API\AnhBaiVietController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/forgot-password', [AuthController::class, 'forgot']);
Route::post('/reset-password', [AuthController::class, 'reset']);


    Route::get('/profile', [AuthController::class, 'profile']);
    Route::apiResource('/miens', MienController::class);
    Route::apiResource('/theloais', TheLoaiController::class);
    Route::apiResource('/diadanhs', DiaDanhController::class);
    Route::apiResource('/tienichs', TienIchController::class);
    Route::apiResource('/baiviets', BaiVietController::class);
    Route::apiResource('nguoidungs',NguoiDungController::class);
//route bài viết
    Route::middleware('auth:sanctum')->group(function () {
Route::post('BaivietUS',[BaiVietController::class,'BaivietUS']);


Route::get('BaiVietNhieuLike',[BaiVietController::class,'BaiVietNhieuLike']);
Route::get('BVLienQuan/{id}',[BaiVietController::class,'BVLienQuan']);
    //route like
Route::apiResource('Like',LikeController::class);
Route::post('/XoaLike', [LikeController::class, 'XoaLike']);
Route::post('/KtraLike', [LikeController::class, 'KtraLike']);
    Route::apiResource('/View',ViewController::class);
Route::post('/XoaView', [LikeController::class, 'XoaView']);
Route::post('/KtraView', [ViewController::class, 'KtraView']);
//route Tiện ích
Route::apiResource('TienIch',TienIchController::class);
Route::apiResource('CoTienIch',CoTienIchController::class);
Route::get('/danhsachkhachsan/{MaDiaDanh}', [CoTienIchController::class, 'show2']);
Route::get('/danhsachnhahang/{MaDiaDanh}', [CoTienIchController::class, 'show1']);

//TestRoute::middleware('auth:sanctum')->group(function () {


        // lấy thông tin user hiện tại
        Route::get('baiviettop5',[BaiVietController::class,'baiviettop5']);
       
        Route::get('/logout', [AuthController::class, 'logout']);
    });