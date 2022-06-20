<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('clients')->insert([
            [
                'name' => 'Ivalter Barellos Guedes',
                'email' => 'ivalterbarellos@gmail.com',
                'cpf' => '429.224.501-04',
                'phone' => '(12) 42922-5438',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Luciane Carmanin Brito',
                'email' => 'lucianecamanin@gmail.com',
                'cpf' => '642.473.210-13',
                'phone' => '(12) 12366-1234',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Ledir Rodrigues Araujo',
                'email' => 'ledirrodrigues@gmail.com',
                'cpf' => '642.473.210-13',
                'phone' => '(12) 98764-1234',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
