<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'kandidat_id'];

    function user()
    {
        return $this->belongsTo(User::class);
    }

    function kandidat()
    {
        return $this->belongsTo(Kandidat::class, 'kandidat_id');
    }
}
