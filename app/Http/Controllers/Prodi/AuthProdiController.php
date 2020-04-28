<?php

namespace App\Http\Controllers\Prodi;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthProdiController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:prodi')->except(['logout']);
    }

    public function showLogin(){
        return view('auth.prodi_login');
    }
    public function login(Request $request){
        $credential = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::guard('prodi')->attempt($credential)){
            return redirect()->route('prodi.dashboard');
        }
        return redirect()->back()->with('message','Gagal Login');
    }

    public function logout(){
        Auth::guard('prodi')->logout();
        return redirect()->route('prodi.login');
    }
}
