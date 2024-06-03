<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\MasterKandidat;


class KandidatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        MasterKandidat::create([
        'username' => 'Kandidat 1', 
        'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eos autem at provident rerum quam quidem dolorum molestias facilis distinctio odit.',
        'unit_kerja' => 'MABA',
        'vote_count' => 10]);
        MasterKandidat::create([
        'username' => 'Kandidat 2',
        'description' => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Veritatis, error.',
        'unit_kerja' => 'PTG',
        'vote_count' => 10]);
        MasterKandidat::create([
        'username' => 'Kandidat 3',
        'description' => 'Lorem ipsum dolor, sit amet consectetur adipisicing elit. Quo, saepe et minus vero laboriosam repellat?',
        'unit_kerja' => 'LHG',
        'vote_count' => 10]);
    }
}
