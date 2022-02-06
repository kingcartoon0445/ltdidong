<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NguoiDung;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use DB;

class LoginController extends Controller
{
    public function index(){
        $data = NguoiDung::where('id','=',session('LoggedUser'))->first();
        
        if(Storage::disk('public')->exists($data->AnhNen)){
            $data->AnhNen = Storage::url($data->AnhNen);
        }
        else{
            $data->AnhNen = 'storage/images/no_image_holder.png';
        }

        return view('index', ['LoggedUserInfo'=>$data]);
    }

    public function register(){
        return view('register');
    }

    public function login(){
        return view('login');
    }

    public function save(Request $request){
        $request->validate([
            'HoTen'=> ['required'],
            'Email'=> ['required','email','unique:nguoi_dungs'],
            'MatKhau'=> ['required'],
            'SDT'=> ['required','min:10','max:12'],
        ],[
            'HoTen.required' => 'Vui lòng nhập họ tên',
            'Email.required' => 'Vui lòng nhập email',
            'MatKhau.required' => 'Vui lòng nhập mật khẩu',
            'SDT.required' => 'Vui lòng nhập số điện thoại',
        ]);

        $nguoiDung = new NguoiDung;
        $nguoiDung->fill([
            'TenDaiDien'=>$request->input('HoTen'),
            'HovaTen'=>$request->input('HoTen'),
            'Email'=>$request->input('Email'),
            'SDT'=>$request->input('SDT'),
            'AnhNen'=>'',
            'MatKhau'=>Hash::make($request->input('MatKhau')),
        ]);

        $nguoiDung->save();

        return back()->with('success', 'Đăng ký tài khoản mới thành công');
    }

    public function check(Request $request){
        $request->validate([
            'Email'=> ['required','email'],
            'MatKhau'=> ['required'],
        ],[
            'Email.required' => 'Vui lòng nhập email',
            'MatKhau.required' => 'Vui lòng nhập mật khẩu',
        ]);

        $userInfo = NguoiDung::where('Email','=',$request->input('Email'))->first();

        if(!$userInfo){
            return back()->with('fail', 'Email này không tồn tại');
        }else{
            if(Hash::check($request->input('MatKhau'), $userInfo->MatKhau) || $request->input('MatKhau')==$userInfo->MatKhau){
                if($userInfo->TrangThai == 1){
                    if($userInfo->IsAdmin == 1){
                        $token = $userInfo->createToken('API Token')->plainTextToken;
                        $request->session()->put('LoggedUser', $userInfo->id);

                        return redirect('/');
                    }else{
                        return back()->with('fail', 'Tài khoản của bạn không đủ quyền hạn để đăng nhập');
                    }
                }else{
                    return back()->with('fail', 'Tài khoản đã bị khóa');
                }
            }else{
                return back()->with('fail', 'Sai mật khẩu');
            }
        }
    }

    public function logout(){
        if(session()->has('LoggedUser')){
            DB::table('personal_access_tokens')->where('tokenable_id', session()->get('LoggedUser'))->delete();

            session()->pull('LoggedUser');

            return redirect('login');
        }
    }
}
