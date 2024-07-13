<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function index(){
        return view('auth.login');
    }

    public function login_proses(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' =>'required'
        ]);

        $data = [
            'username' => $request->username,
            'password' => $request->password,
        ];


        if(Auth::attempt($data)){
                return redirect()->route('dashboard.index');
            
        } else {
            return redirect()->route('login')->with('error', 'username atau Password Salah, Silahkan Coba Lagi!');
        }
    }
    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
