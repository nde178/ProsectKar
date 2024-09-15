<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = [
            'name' => 'admin',
            'email' => 's9hrt@example.com',
            'password' => bcrypt('password'),
        ];
        $user = User::firstOrCreate([
            'email' => $user['email'],
        ], [
            'name' => $user['name'],
            'password' => $user['password'],
        ]
        );

        $this->call([
            NoteSeeder::class,
            TagSeeder::class,
        ]);
    }
}
