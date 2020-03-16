<?php

namespace App\Http\Controllers;

use App\mytube;
use Illuminate\Http\Request;
use App\Http\Requests\loginRequest;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\registerRequest;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view("mytube/login");
    }
    public function postLogin(loginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $kt = Auth::attempt($credentials);
        if ($kt)
            return redirect('listVideo');
        else
            echo "that bai";
    }
    public function getRegister()
    {
        return view("mytube/register");
    }
    public function postRegister(registerRequest $request)
    {
        $thanhvien = new User();
        $thanhvien->name = $request->name;
        $thanhvien->email = $request->email;
        $thanhvien->password = $request->password;
        $thanhvien->remember_token = $request->_token;
        $thanhvien->password = Hash::make($request->password);
        $thanhvien->save();
        if ($thanhvien)
            echo "đăng nhập thành công roài =======> " . "<a href='logins'> đăng nhập </a>";
        else {
            echo "mk khác nhau kìa b êy";
        }
    }
    public function home()
    {
        return view("update");
    }
    public function Index()
    {
        return view("auth/index");
    }
}
