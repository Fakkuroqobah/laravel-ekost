<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use App\Http\Requests\LoginRequest;
use App\Models\Pemilik_kos;
use App\Models\User;
use Auth;

class AuthController extends Controller
{    
    public function getLogin()
    {
        return view('auth.login');
    }

    public function postLogin(Request $request)
    {
        if(!\Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('login')->with('warning', 'Email atau Password salah');
        }

        return redirect('/');
    }

    public function getRegister()
    {       
        return view('auth.register');
    }

    public function postRegister(RegisterRequest $request)
    {
        User::create([
            'nama' => $request->nama,
            'jenis_kelamin' => $request->jk,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'email'  => $request->email,
            'password'  => bcrypt($request->password)
        ]);

        // auth()->loginUsingId($user->id);
        return redirect()->route('login')->with('success', 'Pendaftaran berhasil, silahkan login');
    }

    public function registerPemilik()
    {
        return view('auth.registerPemilik');
    }

    public function postRegisterPemilik(Request $request)
    {
        Pemilik_kos::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'no_rek' => $request->no_rek,
            'password' => bcrypt($request->password)
        ]);

        return redirect()->route('login.pemilik')->with('success', 'Pendaftaran berhasil, gunakan layanan ini dengan bijak');
    }
    

    public function getLoginPemilik()
    {
        return view('auth.loginPemilik');
    }

    public function postLoginPemilik(Request $request)
    {
        if(!\Auth::guard('pemilik-kos')->attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->back()->with('warning', 'Email atau Password salah');
        }

        if(\Auth::guard('pemilik-kos')->user()->aktif == 0) {
            \Auth::logout();
            return redirect()->back()->with('warning', 'Akun kamu belum di aktivasi oleh admin');
        }

        return redirect()->route('dash.pemilik');
    }

    public function getLoginAdmin()
    {
        return view('auth.loginAdmin');
    }

    public function postLoginAdmin(Request $request)
    {
        if(!\Auth::guard('admin')->attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->back()->with('warning', 'Username atau Password salah');
        }

        return redirect()->route('permintaan');
    }

    public function logout() 
    {        
        \Auth::logout();

        return redirect('/');
    }
}