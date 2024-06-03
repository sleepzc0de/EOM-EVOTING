<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


class RegistrasiController extends Controller
{
    public function registrasi()
    {
        $title = 'Registrasi';
        return view('registrasi',[
            'title' => $title
        ]);
    }

    public function store(Request $request)
    {
        $data=$request->validate([
          'email' => 'required|unique:users|email:dns',
          'username' => 'required|min:3|max:255|unique:users',
          'unit_kerja' => 'required|min:3|max:255',
          'no_telpon' => 'required|min:11|max:13|unique:users',
          'password' => 'required|min:3|max:255'
        
      ]);
      
      $data['password']= Hash::make($data['password']);
      User::create($data);

        return redirect('/registrasi')->with('success','Registrasi success, Silahkan login :)');
    }
}
