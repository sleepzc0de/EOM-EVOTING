<?php

namespace App\Http\Controllers;

use App\Models\MasterKandidat;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;



class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kandidat = MasterKandidat::all();
        $title = 'Admin Dashboard';
        // dd($kandidat);
        return view('admin.dashboard',[
            'title' => $title,
            'kandidat' => $kandidat
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kandidat = MasterKandidat::count();
        if ($kandidat >= 3) {
            return redirect()->route('admin.index')->with('danger', 'Anda hanya dapat menambahkan maksimal 3 kandidat.');
        }
        $title = 'Tambah kandidat';
        return view('admin.tambahkandidat',[
            'title' => $title
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->file('gambar')->store('profil-image');

        $data = $request->validate([
            'username' => 'required|max:255',
            'unit_kerja' => 'required|min:3',
            'gambar' => 'image|file|max:1024',
        ]);

        if($request->file('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('profil-images');
        }
       

        $data['master_kandidat'] = auth()->user()->id;
        $data['description']= Str::limit(strip_tags($request->description), 200);

        MasterKandidat::create($data);

        // dd('berhasil tambah data');
        return redirect('admin')->with('success','Berhasil tambah data');
    }

    /**
     * Display the specified resource.
     */
    public function show(MasterKandidat $MasterKandidat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
{
    $kandidat = MasterKandidat::findOrFail($id);
    $title = 'Halaman edit admin';
    return view('admin.editkandidat', [
        'title' => $title,
        'kandidat' => $kandidat
    ]);
}

/**
 * Update the specified resource in storage.
 */
public function update(Request $request, $id)
{
    $kandidat = MasterKandidat::findOrFail($id);
    
    $rules = [
        'username' => 'required|max:255',
        'unit_kerja' => 'required|min:3',
        'gambar' => 'image|file|max:1024',
    ];
    $data = $request->validate($rules);

    if ($request->hasFile('gambar')) {
        if ($kandidat->gambar) {
            Storage::delete('public/' . $kandidat->gambar);
        }
        $data['gambar'] = $request->file('gambar')->store('profil-images', 'public');
    } else {
        $data['gambar'] = $kandidat->gambar;
    }

    $kandidat->update($data);

    return redirect('admin')->with('success', 'Kandidat updated successfully');
}
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $kandidat = MasterKandidat::findOrFail($id);
        $kandidat->delete();

        return redirect()->back()->with('danger', 'Kandidat berhasil di hapus!!!');

    }
}
