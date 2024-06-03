<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterKandidat;

class KandidatVotingController extends Controller
{
    public function index()
    {
        $kandidat = MasterKandidat::all();
        $title = 'Daftar Kandidat';
        // dd($kandidat);
        return view('backend.kandidat',[
            'title' => $title,
            'kandidat' => $kandidat
        ]);
    }
}
