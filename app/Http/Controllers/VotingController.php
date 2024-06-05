<?php

namespace App\Http\Controllers;

use DB;
use App\Models\User;
use App\Models\Vote;
use App\Models\Voting;
use App\Models\Kandidat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Request as FacadesRequest;

class VotingController extends Controller
{
    function index()
    {
        // Mengambil jumlah suara untuk setiap kandidat
        $voteCounts = Voting::selectRaw('kandidats_id, COUNT(*) as total_votes')
            ->with('kandidat')
            ->groupBy('kandidats_id')
            ->get();

        // Mengambil semua data voting beserta relasi user dan kandidat
        $results = Vote::with(['user', 'kandidat'])->get();

        // Mengambil data user yang terlibat dalam voting
        $users = User::whereIn('id', $results->pluck('user_id'))->get();

        return view('admindashboard', compact('results', 'voteCounts', 'users'));
    }

    function data()
    {

        $kandidats = Kandidat::withCount('votes')->get();

        // Mengambil jumlah suara untuk setiap kandidat
        $voteCounts = Vote::selectRaw('kandidat_id, COUNT(*) as total_votes')
            ->with('kandidat')  // Pastikan relasi kandidat dimuat
            ->groupBy('kandidat_id')
            ->get();

        $results = Vote::with(['user', 'kandidat'])->get();

        return view('admindashboard', compact('kandidats', 'voteCounts', 'results'));
    }
}
