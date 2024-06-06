<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Vote;
use App\Models\Voting;
use App\Models\Kandidat;


class AdminController extends Controller
{
    function index()
    {
        $voteCounts = Voting::selectRaw('kandidats_id, COUNT(*) as total_votes')
            ->with('kandidat')
            ->groupBy('kandidats_id')
            ->get();

        // Mengambil semua data voting beserta relasi user dan kandidat
        $results = Vote::with(['user', 'kandidat'])->get();

        // Mengambil data user yang terlibat dalam voting
        $users = User::whereIn('id', $results->pluck('user_id'))->get();

        $kandidats = Kandidat::withCount('votes')->get();

        // Mengambil jumlah suara untuk setiap kandidat
        $voteCounts = Vote::selectRaw('kandidat_id, COUNT(*) as total_votes')
            ->with('kandidat')  // Pastikan relasi kandidat dimuat
            ->groupBy('kandidat_id')
            ->get();

        $results = Vote::with(['user', 'kandidat'])->get();

        return view('admindashboard', compact('results', 'voteCounts', 'users'));
    }
}
