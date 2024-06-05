<?php

namespace App\Http\Controllers;

use App\Models\Vote;
use App\Models\MasterKandidat;
use Illuminate\Http\Request;

class VotingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kandidat = MasterKandidat::all();
        $title = 'Voting';
       
        // dd($profil);
        return view ('backend.voting',[
            'title' => $title,
            'kandidat' => $kandidat,
          
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'vote' => 'required', // Pastikan vote tidak kosong
        ]);

        // Cek apakah user sudah melakukan voting
        $existingVote = Vote::where('user_id', auth()->id())->first();
        if ($existingVote) {
            return redirect()->back()->with('error', 'Anda sudah melakukan voting.');
        }
    
        // Simpan voting ke database
        $vote = new Vote();
        $vote->user_id = auth()->id(); // Ambil ID user yang sedang login
        $vote->master_id = $request->input('vote'); // Ambil id kandidat yang dipilih
        $vote->vote_value = true; // Misalnya, Anda bisa mengatur nilai vote menjadi true
        $vote->save();
    
        // Update vote count di tabel master_kandidat
        $kandidat = MasterKandidat::find($vote->master_id);
        $kandidat->vote_count = $kandidat->votes()->count();
        $kandidat->save();
        
        // dd('berhasil vote');
    
        // Tampilkan pesan sukses atau redirect ke halaman lain
        return redirect('/voting')->with('success', 'Voting berhasil.');
    
    }

    /**
     * Display the specified resource.
     */
    public function show(Vote $vote)
    {
        $kandidat = MasterKandidat::all();
        $title = 'Daftar Kandidat';
        // dd($kandidat);
        return view('backend.kandidat',[
            'title' => $title,
            'kandidat' => $kandidat
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Vote $vote)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Vote $vote)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Vote $vote)
    {
        //
    }
}
