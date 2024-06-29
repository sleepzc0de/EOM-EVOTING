<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{
    public function welcome()
    {
        $title = 'E-Voting Kementerian Keuangan';
        return view('homepage',[
            'title' => $title
        ]);
    }
}
