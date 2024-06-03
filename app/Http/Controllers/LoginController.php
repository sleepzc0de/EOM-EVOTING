<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function login()
    {
        $title = 'Login';
        return view('login',[
            'title' => $title
        ]);
    }

    public function authenticate(Request $request) {

        $login=$request->validate([
            'email'=> 'required|email:dns',
            'password'=>'required'
        ]);

        if (Auth::attempt($login)) {
            $request->session()->regenerate();
            // dd('berhasil login');
            return redirect()->intended('/dashboard');
        }
        
        return back()->with('LoginError','login eror');
    }

    public Function logout(Request $request) {
        
            Auth::logout();
         
            $request->session()->invalidate();
         
            $request->session()->regenerateToken();
         
            return redirect('/');
        
    }
}
