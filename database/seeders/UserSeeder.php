<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Maria Eduarda',
            'email' => 'mariaeduarda@gmail.com',
            'password' => '$2y$10$H/QkdnCY30CaUZxEAMkBiet4I1wwrbJN1/dK6U7d9Eszeq1C1KFmS', // M4tr1x123
            'created_at' => now(),
            'updated_at' => now(),
            'email_verified_at' => now(),
        ]);
    }
}
