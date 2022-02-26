<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\NguoiDung;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use Illuminate\Support\Facades\Mail;
use App\Mail\ForgotPassword;

use DB; 
use Illuminate\Support\Str;
use Carbon\Carbon; 

class AuthController extends Controller
{
    public function register(Request $request){
        $data = $request->validate([
            'TenDaiDien' => 'required|string',
            'HovaTen' => 'required|string',
            'Email' => 'required|email|unique:nguoi_dungs,Email',
            'MatKhau' => 'required|string',
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

    public function logout(Request $request){
        $check =  $request->user()->currentAccessToken()->delete();
        return $check != 0 ? ['status' =>'200'] : ['status' =>'400'];
    }

    public function login(Request $request){
        $data = $request->validate([
            'Email' => 'required|email|max:255',
            'MatKhau' => 'required|string|max:255',
        ]);

        $nguoiDung = NguoiDung::where('Email', $data['Email'])->first();

        //if(!$nguoiDung || !Hash::check($data['MatKhau'], $nguoiDung['MatKhau'])){
          if(!$nguoiDung || ( $request->MatKhau != $nguoiDung->MatKhau)){
            return response()->json(['message' => 'sai']
        );
        }
        else{
            $token = $nguoiDung->createToken('API Token')->plainTextToken;

            return response()->json([
                //'nguoi_dung' => $nguoiDung,
                'id'=>$nguoiDung->id,
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

    public function forgot(Request $request){
        $data = $request->validate([
            'Email' => 'required|email'
        ]);

        $nguoiDung = NguoiDung::where('Email', $data['Email'])->first();

        if(!$nguoiDung){
            return response()->json([
                'message' => 'Email này không tồn tại.',
            ], 400);
        }
        else{
            $token = Str::random(64);

            DB::table('password_resets')->insert([
                'email' => $data['Email'], 
                'token' => $token,
                'created_at' => Carbon::now()
            ]);

            Mail::to($request['Email'])->send(new ForgotPassword($nguoiDung->HovaTen, $token));

            return response()->json([
                'message' => 'Yêu cầu reset password đã được gửi vào mail của bạn.',
            ], 200);
        }
    }

    public function reset_view($token){
        $data = DB::table('password_resets')->where('token', $token)->first();

        if(!$data){
            return abort(404);
        }

        return view('forgot', ['data'=>$data]);

    }

    public function reset(Request $request){
        $data = $request->validate([
            'Email' => 'required|email|exists:nguoi_dungs',
            'MatKhau' => 'required|string',
        ],[
            'Email.required' => 'Vui lòng nhập địa chỉ email',
            'Email.exists' => 'Email này không tồn tại trong hệ thống',
            'MatKhau.required' => 'Vui lòng nhập mật khẩu',
        ]);

        $updatePassword = DB::table('password_resets')
                            ->where(['email' => $data['Email']])
                            ->first();

        if(!$updatePassword){
            if ($request->ajax()) {
                return response()->json([
                    'message' => 'Email này không tồn tại.',
                ], 400);
            }
            else{
                return back();
            }
        }

        NguoiDung::where('Email', $data['Email'])
                    ->update(['MatKhau' => Hash::make($data['MatKhau'])]);

        DB::table('password_resets')->where(['email'=> $data['Email']])->delete();

        if ($request->ajax()) {
            return response()->json([
                'message' => 'Thay đổi mật khẩu thành công',
            ], 200);
        }
        else{
            return redirect('success');
        }
    }
}
