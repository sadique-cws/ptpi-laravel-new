<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {


        User::create([
            'first_name' => 'teacher',
            "last_name" => "demo",
            'email' => 'teacher@ptpi.com',
            "password" => Hash::make("123456789"),
            "role" => "teacher"
        ]);
        User::create([
            'first_name' => 'admin',
            "last_name" => "demo",
            'email' => 'admin@ptpi.com',
            "password" => Hash::make("123456789"),
            "role" => "admin"
        ]);
        User::create([
            'first_name' => 'recruiter',
            "last_name" => "demo",
            'email' => 'recruiter@ptpi.com',
            "password" => Hash::make("123456789"),
            "role" => "recruiter"
        ]);
        User::create([
            'first_name' => 'examsetter',
            "last_name" => "demo",
            'email' => 'examsetter@ptpi.com',
            "password" => Hash::make("123456789"),
            "role" => "examsetter"
        ]);
    }
}
