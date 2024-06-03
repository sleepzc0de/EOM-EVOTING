<?php

namespace App\Http\Controllers;

use App\Models\Master_Kandidat;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = 'Admin Dashboard';
        return view('admin.tambahkandidat',[
            'title' => $title
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Master_Kandidat $master_Kandidat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Master_Kandidat $master_Kandidat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Master_Kandidat $master_Kandidat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Master_Kandidat $master_Kandidat)
    {
        //
    }
}
