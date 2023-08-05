<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index() {
        return view('auth.login');
    }

    public function store(Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            if(Auth::user()->role_id == '1') {
                return redirect('/admin');
            }
            if(Auth::user()->role_id == '2') {
                return redirect('/anggota');
            }
        }

        return redirect()->route('login');
    }

    public function logout()
    {
        Session::flush();
        
        Auth::logout();

        return redirect('login');
    }
}