<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function about()
    {
        $title = 'Tentang E-Voting Kementerian Keuangan';
        return view('about',[
            'title' => $title
        ]);
    }
}
