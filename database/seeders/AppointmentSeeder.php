<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('appointments')->insert([
            [
                'appointment_date' => '2022-02-10 19:00:00',
                'appointment_reason' => 'Extração dentária',
                'user_id' => 1,
                'client_id' => 1,
                'dentist_id' => 1
            ],
            [
                'appointment_date' => '2022-02-15 19:00:00',
                'appointment_reason' => 'Extração dentária',
                'user_id' => 1,
                'client_id' => 2,
                'dentist_id' => 1
            ],
            [
                'appointment_date' => '2022-03-15 19:00:00',
                'appointment_reason' => 'Extração dentária',
                'user_id' => 1,
                'client_id' => 2,
                'dentist_id' => 2
            ],
            [
                'appointment_date' => '2022-03-15 19:30:00',
                'appointment_reason' => 'Extração dentária',
                'user_id' => 1,
                'client_id' => 2,
                'dentist_id' => 2
            ]
        ]);
    }
}
