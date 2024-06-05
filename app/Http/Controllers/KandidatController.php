<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use Illuminate\Http\Request;

class KandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function index()
    {
        $kandidats = Kandidat::all();
        $MaxKandidats = Kandidat::count();
        // dd($MaxKandidats);
        return view('kandidat.index', compact(['kandidats', 'MaxKandidats']));
    }

    /**
     * Show the form for creating a new resource.
     */
    function create()
    {
        return view('kandidat.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'foto' => 'required|image',
            'unit_bagian' => 'required'
        ]);

        $path = $request->file('foto')->move('images', $request->file('foto')->getClientOriginalName());

        Kandidat::create([
            'nama' => $request->nama,
            'foto' => $path,
            'unit_bagian' => $request->unit_bagian,
        ]);

        return redirect()->route('kandidat.index');
    }

    /**
     * Display the specified resource.
     */
    function show($id)
    {
        $kandidat = Kandidat::findOrFail($id);
        return view('kandidat.show', compact('kandidat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    function edit($id)
    {
        $kandidat = Kandidat::findOrFail($id);
        return view('kandidat.edit', compact('kandidat'));
    }

    /**
     * Update the specified resource in storage.
     */
    function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'foto' => 'image',
            'unit_bagian' => 'required',
        ]);

        $kandidat = Kandidat::findOrFail($id);

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->move('images', $request->file('foto')->getClientOriginalName());
            $kandidat->update([
                'nama' => $request->nama,
                'foto' => $fotoPath,
                'unit_bagian' => $request->unit_bagian,
            ]);
        } else {
            $kandidat->update([
                'nama' => $request->nama,
                'unit_bagian' => $request->unit_bagian,
            ]);
        }

        return redirect()->route('kandidat.index')->with('success', 'Kandidat updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    function destroy($id)
    {
        $kandidat = Kandidat::findOrFail($id);
        $kandidat->delete();
        return redirect()->route('kandidat.index')->with('success', 'Kandidat deleted successfully.');
    }

}