<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class NoteSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Note::factory(10)->create();
    }
}
