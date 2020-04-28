<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthAdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:admin')->except(['logout']);
    }

    public function showLogin(){
        return view('auth.admin_login');
    }
    public function login(Request $request){
        $credential = [
            'username' => $request->username,
            'password' => $request->password,
        ];

        if (Auth::guard('admin')->attempt($credential)){
            return redirect()->route('admin.dashboard');
        }
        return redirect()->back()->with('message','Gagal Login');
    }

    public function logout(){
        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }

}
