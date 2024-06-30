<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\save;

class ProfilController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $title = 'Halaman profil';
        return view('backend.profil.index', [
            'title' => $title,
            'user' => $user
        ]);
    }

    public function edit(User $user)
    {
        $user = auth()->user();
        $title = 'Edit Profil';
        return view('backend.profil.edit', [
            'title' => $title,
            'user' => $user
        ]);
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $rules = [
            'email' => 'required|email:dns|unique:users,email,' . $user->id,
            'username' => 'required|max:255',
            'unit_kerja' => 'required|min:3',
            'no_telpon' => 'required|min:11|max:13|unique:users,no_telpon,' . $user->id,
            'gambar' => 'image|file|max:1024',
        ];

        $data = $request->validate($rules);

        // dd($data);

        if ($request->hasFile('gambar')) {
            if ($user->gambar) {
                Storage::delete('public/' . $user->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('profil-images', 'public');
        } else {
            $data['gambar'] = $user->gambar;
        }

        User::where('id', auth()->user()->id)
        ->update($data);
        // $user->update($data);

        return redirect('profil')->with('success', 'Berhasil Mengubah Data');
    }

    public function changePassword()
    {
        $user = auth()->user();
        $title = 'Ganti Password';
        // dd($user);
        return view('backend.profil.changepassword', [
            'title' => $title,
            'user' => $user
        ]);
    }

    public function gantiPassword(Request $request)
    {
    //    $data = $request->validate([
    //         'old_password' => 'required|min:3|max:255',
    //         'new_password' => 'required|min:3|max:255',
    //         'repeat_password' => 'required|min:3|max:255|same:new_password',
    //     ]);

    //     $user = auth()->user();



    //    // Pengecekan password lama
    //    if (!Hash::check($request->old_password, $user->password)) {
    //          return back()->with('error', 'Password lama salah!!!!');
    //     }

    //     // Pengecekan kesamaan password baru dan konfirmasi password
    //     if (hash::make($request->new_password) != hash::make($request->repeat_password)) {
    //         return back()->with('error', 'Password tidak sama!!!!');
    //     }


    //     // var_dump($user);
    //     // User::where('passsword', auth()->user()->id)
    //     // ->update($user);

    //     User::where('id',$user->id)->update($data);

    //     // dd($user);
     


        // return redirect('/profil')->with('status', 'Password berhasil diubah');
        $user = auth()->user();

        if (!Hash::check($request->current_password, $user->password)) {
            return redirect()->back()->with('error', 'Password Lama Salah!!!');
            }
        
        $rules = [
            // 'current_password' => 'required',  
            'password' => 'required|min:3|max:255|confirmed',         
            
            ];

        $messages = [
            'password.confirmed' => 'Password Anda Tidak Sesuai!!!',
        ];

        $data = $request->validate($rules, $messages);
        // $data['current_password'] = Hash::make($request->current_password);
        $data['password'] = Hash::make($request->password);

        // $data2['password2'] = Hash::make($request->password);

        // dd((!Hash::check($request->current_password, $user->password)));


        // $pw = [
        //     'password' => 'required|min:3|max:255|confirmed',
        // ];
        // $data2 = $request->validate($pw);
        // $data2['password'] = Hash::make($request->password);
        // $data = $request->validate($rules);
        // if (!Hash::check($request->password, $user->password)) {
        //     return redirect('changepassword')->with('erorr', 'Password salah!!!');
        // }

        // $data['current_password'] = Hash::make($request->password);
        


        // PR AKMAL BIKIN CEK PASSWORD LAMA DENGAN DATABASE , JIKA SAMA NGAPAIN? JIKA GA SAMA NGAPAIN?

        // dd((!Hash::check($data['password'], $user->password)));
            // if(!Hash::check($data['password'], $user->password)) {
            //     return back()->with('error', 'Password lama salah!!!!');
            // }



        // END

        User::where('id', $user->id)->update($data);

        return redirect('profil')->with('success', 'Berhasil Mengubah Password');
    }
}
