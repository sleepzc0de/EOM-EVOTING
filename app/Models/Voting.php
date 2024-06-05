<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voting extends Model
{
    protected $fillable = [
        'user_id',
        'kandidat_id',
        'unit_bagian',
        'id_voting'
    ];

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function kandidat()
    {
        return $this->belongsTo(Kandidat::class, 'kandidats_id');
    }
}
