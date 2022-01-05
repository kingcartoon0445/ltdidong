<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;
use App\Models\NguoiDung;
use App\Http\Controllers\NguoiDungController;
use App\Http\Controllers\BaivietController;
use App\Http\Controllers\MienController;
use App\Http\Controllers\TienIchController;
use App\Http\Controllers\DiaDanhController;
use App\Http\Controllers\TheloaiController;
use App\Http\Controllers\ViewController;

/*Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    if (! $user || ! Hash::check($request->password, $user->password)) {
        throw ValidationException::withMessages([
            'email' => ['The provided credentials are incorrect.'],
        ]);
    }

    return ['token'=> $user->createToken($request->device_name)->plainTextToken];
});*/
/*Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:sanctum')->get('user/deleteTokenUserCurrent', function ( Request $request) {
    return  $request->user()->currentAccessToken()->delete();
});*/

Route::post('/sanctum/token', function (Request $request) {
    $request->validate([
        'email' => 'required|email',
        'password' => 'required',
        'device_name' => 'required',
    ]);

    $user = NguoiDung::where('email', $request->email)->first();
   // return $user;
   // return [$request->password, $user->MatKhau];

    if (! $user ||( $request->password != $user->MatKhau)) {
        throw ValidationException::withMessages([
            'email' => ['email hoac mk ko dung.'],
        ]);
    }

    return ['token'=> $user->createToken($request->device_name)->plainTextToken];
});


// Route::get('/test', function () {
//    return NguoiDung::all();
// });

// Route::post('/test', function () {
//     return NguoiDung::all();
//  });

Route::apiResource('NguoiDung',NguoiDungController::class);
Route::apiResource('BaiViet',BaivietController::class);
Route::apiResource('Mien',MienController::class);
Route::middleware('auth:sanctum')->apiResource('TienIch',TienIchController::class);
Route::apiResource('DiaDanh',DiaDanhController::class);
Route::apiResource('View',ViewController::class);
//Route::middleware('auth:sanctum')->apiResource('DiaDanh',DiaDanhController::class);
Route::middleware('auth:sanctum')->apiResource('TheLoai',TheloaiController::class);