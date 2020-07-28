<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Validator;
use Auth;

class PasswordController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:mahasiswa');
    }

    public function change()
    {
        return view('auth.changepass_mahasiswa');
    }

    public function update ()
    {
        // custom validator
        Validator::extend('old_password', function ($attribute, $value, $parameters, $validator) {
            return Hash::check($value, Auth::user()->password);
        });

        // message for custom validation
        $messages = [
            'password' => 'Password yang anda masukan salah.',
            'confirmed' => 'Password tidak sama',
            'min' => 'Password minimal 6 karakter'
        ];

        // validate form
        $validator = Validator::make(request()->all(), [
            'old_password'      => 'required|password',
            'password'      => 'required|min:6|confirmed',
        ], $messages);

        // if validation fails
        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator->errors());
        }

        // update password
        $user = Auth::user();

        $user->password = bcrypt(request('password'));
        $user->update();

        return redirect()
            ->route('mahasiswa.dashboard')
            ->with('success','Password berhasil diubah');
    }
}
