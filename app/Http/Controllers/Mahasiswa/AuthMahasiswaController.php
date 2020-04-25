<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthMahasiswaController extends Controller
{
    public function __construct()
    {
       // $this->middleware('guest:mahasiswa')->except(['logout']);
    }

    public function showLogin(){
        return view('auth.mahasiswa_login');
    }
    public function login(Request $request){
        $credential = [
            'nim' => $request->nim,
            'password' => $request->password,
        ];

        if (Auth::guard('mahasiswa')->attempt($credential)){
            return redirect()->route('mahasiswa.dashboard');
        }
        return redirect()->back()->with('message','Gagal Login');
    }

    public function logout(){
//        Auth::guard('mahasiswa')->logout();
//        return redirect()->route('mahasiswa.landingpage');
    }
}
