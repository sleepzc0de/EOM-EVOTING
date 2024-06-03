<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MasterKandidat extends Model
{
    protected $table = 'master_kandidat';
    protected $guarded = ['id'];

    public function votes()
    {
        return $this->hasMany(Vote::class, 'master_id');
    }
}

