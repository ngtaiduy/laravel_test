<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function loginForm()
    {
        if (Auth::user()) {
            return redirect(route('home'));
        } else {
            return view('user.login_form');
        }
    }

    public function postLogin(Request $request)
    {
        $email = $request->email;
        $check_status_user = User::where('email', $email)->first()->status;

        if ($check_status_user == 1) {
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                return redirect(route('home'));
            } else {
                return back()->with('msg', 'Tài khoản/mật khẩu không chính xác');
            }
        } else {
            return back()->with('msg', 'Tài khoản không hoạt động, vui lòng liên hệ admin để kích hoạt');
        }
    }

    public function actionLogOut()
    {
        Auth::logout();
        return redirect(route('home'));
    }

    public function registerForm()
    {
        if (Auth::user()) {
            return redirect(route('home'));
        } else {
            return view('user.register_form');
        }
    }

    public function saveRegister(Request $request)
    {
        $email = $request->email;
        $password = $request->password;
        $re_password = $request->re_password;

        if ($password != $re_password) {
            return back()->with('msg_re_password', 'Mật khẩu nhập lại không đúng');
        } else {
            $check_user_by_email = User::where('email', $email)->count();
            if ($check_user_by_email > 0) {
                return back()->with('msg_email', 'Email đã có người đăng ký');
            } else {
                $user = new User();
                $user->gender = 0;
                $user->email = $email;
                $user->password = Hash::make($password);
                $user->avatar = 'image/users/user-default-avatar.jpg';
                $user->role_id = 3;
                $user->status = 0;
                $user->save();
                return redirect(route('register'))->with('msg', 'Bạn đã đăng ký tài khoản thành công');
            }
        }
    }

    public function changePasswordForm()
    {
        if (Auth::user()) {
            return view('user.change_password');
        } else {
            return redirect(route('login'));
        }
    }

    public function saveChangePassword(Request $request)
    {
        if (Auth::user()) {
            $user = User::find(Auth::user()->id);
            $password = $request->password;
            $re_password = $request->re_password;
            $re_password_2 = $request->re_password_2;

            if (password_verify($password, Auth::user()->password)) {
                if ($re_password == $re_password_2) {
                    $newPasswordHash = Hash::make($re_password);
                    $user->password = $newPasswordHash;
                    $user->save();
                    return redirect(route('change-password'))->with('msg_success', 'Bạn đã thay đổi mật khẩu thành công');
                } else {
                    return redirect(route('change-password'))->with('msg_re_password_2', 'Mật khẩu mới nhập lại không trùng');
                }
            } else {
                return redirect(route('change-password'))->with('msg_password', 'Bạn nhập sai mật khẩu hiện tại');
            }
        } else {
            return view('user.login');
        }
    }
}
