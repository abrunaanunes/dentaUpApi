<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DentistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('dentists')->insert([
            [
                'name' => 'Luiza Souza',
                'email' => 'luizasouza@gmail.com',
                'cpf' => '397.947.858-85',
                'phone' => '(12) 99667-5438',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Poppy Moore',
                'email' => 'poppymoore@gmail.com',
                'cpf' => '397.123.858-85',
                'phone' => '(12) 99667-1234',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Carla Maria',
                'email' => 'carlamaria@gmail.com',
                'cpf' => '987.123.345-85',
                'phone' => '(12) 12365-1234',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
