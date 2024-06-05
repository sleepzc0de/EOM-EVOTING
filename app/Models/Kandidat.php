<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kandidat extends Model
{
    protected $fillable = [
        'nama',
        'foto',
        'unit_bagian',
    ];

    // Tambahkan relasi jika ada, misalnya dengan tabel voting
    function votings()
    {
        return $this->hasMany(Voting::class, 'kandidats_id');
    }

    function votes()
    {
        return $this->hasMany(Vote::class, 'kandidat_id');
    }
}
