<?php

namespace Database\Seeders;

use Database\Factories\NoteFactory;
use App\Models\User;
use App\Models\Note;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Note::factory(30)->create();
    }
}
