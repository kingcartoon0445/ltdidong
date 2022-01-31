<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\NguoiDung;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            'TenDaiDien' => 'required|string|max:255',
            'HovaTen' => 'required|string|max:255',
            'Email' => 'required|email|max:255|unique:nguoi_dungs,Email',
            'MatKhau' => 'required|string|max:255',
            'SDT' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
        ]);

        $nguoiDung = NguoiDung::create([
            'TenDaiDien' => $data['TenDaiDien'],
            'HovaTen' => $data['HovaTen'],
            'Email' => $data['Email'],
            'MatKhau' => Hash::make($data['MatKhau']),
            'SDT' => $data['SDT'],
            'AnhNen' => '',
        ]);

        $token = $nguoiDung->createToken('API Token')->plainTextToken;

        return response()->json([
            'nguoi_dung' => $nguoiDung,
            'token' => $token,
        ], 200);
    }

    public function logout()
    {
        Auth::user()->tokens()->delete();

        return response()->json(['message' => 'Logged Out Successfully'], 200);
    }

    public function login(Request $request)
    {
        $data = $request->validate([
            'Email' => 'required|email|max:255',
            'MatKhau' => 'required|string|max:255',
        ]);

        $nguoiDung = NguoiDung::where('Email', $data['Email'])->first();

        if(!$nguoiDung || !Hash::check($data['MatKhau'], $nguoiDung['MatKhau'])){
            return response()->json(['message' => 'Đăng nhập thất bại'], 400);
        }
        else{
            $token = $nguoiDung->createToken('API Token')->plainTextToken;

            return response()->json([
                'nguoi_dung' => $nguoiDung,
                'token' => $token,
            ], 200);
        }
    }

    public function profile(){
        if(Storage::disk('public')->exists(Auth::user()->AnhNen)){
            Auth::user()->AnhNen = Storage::url(Auth::user()->AnhNen);
        }
        else{
            Auth::user()->AnhNen = Storage::url('images/no_image_holder.png');
        }
        return response()->json(Auth::user(), 200);
    }
}
