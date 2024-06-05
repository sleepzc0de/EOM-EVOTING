<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Vote;
use App\Models\AuthApp;
use App\Models\Kandidat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VoteController extends Controller
{
    function index()
    {
        $kandidats = Kandidat::all();
        return view('vote.index', compact('kandidats'));
    }

    function store(Request $request)
    {
        $user = Auth::user();

        // Cek apakah user sudah pernah vote
        if (Auth::check()) {
            $user = Auth::user();
            // Lanjutkan dengan logika Anda di sini
        } else {
            // Handle kasus ketika pengguna tidak masuk
            return redirect()->route('login')->with('error', 'Anda harus masuk untuk melakukan vote.');
        }

        $existingVote = Vote::where('user_id', auth()->id())->first();
        if ($existingVote) {
            return redirect()->back()->with('error', 'Anda sudah melakukan voting.');
        }

        $vote = new Vote;
        $vote->user_id = $user->id;
        $vote->kandidat_id = $request->kandidat_id; // Asumsi `kandidat_id` dikirim dari form
        $vote->save();

        return redirect()->route('vote.index')->with('success', 'Terima kasih telah melakukan vote.');
    }

    function data()
    {
        // Mengambil semua kandidat beserta jumlah vote masing-masing
        $kandidats = Kandidat::withCount('votes')->get();

        $votes = Vote::with('user', 'kandidat')->get();

        return view('vote.results', compact('kandidats', 'votes'));
    }

    function results()
    {
        $kandidats = Kandidat::withCount('votes')->orderBy('votes_count', 'desc')->get();

        return view('vote.results', compact('kandidats'));
    }
}
