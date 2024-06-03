<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MasterKandidat;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $kandidat = MasterKandidat::all();
        $title = 'Welcome Dashboard';
        // dd($kandidat);
        return view('backend.dashboard',[
            'kandidat' => $kandidat,
            'title' => $title
        ]);
    }
}
