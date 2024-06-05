<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\AuthApp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    function register()
    {
        return view('auth.register');
    }

    // Menyimpan data user saat register
    function registersave(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'user',
        ]);

        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }

    function login()
    {
        return view('auth.login');
    }

    // Proses autentikasi saat login
    function loginaction(Request $request)
    {

        Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ])->validate();

        $credentials = $request->only('email', 'password');

        if (!Auth::attempt($credentials, $request->boolean('remember'))) {
            throw ValidationException::withMessages([
                'email' => trans('auth.failed')
            ]);
        }

        $user = Auth::user();

        if ($user->role === 'admin') {
            return redirect()->intended('/dashboard');
        } elseif ($user->role === 'user') {
            return redirect()->intended('/');
        }

        // if (Auth::attempt($credentials)) {
        // $request->session()->regenerate();


        // }
        return redirect()->back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->withInput();
    }


    function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
