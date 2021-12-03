<?php

namespace Database\Seeders;

use App\Models\Presence;
use Illuminate\Database\Seeder;

class PresenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Presence::create([
            'student_id' => '1',
            'nis' => '1190',
            'tgl' => '2021-11-21',
            'jam_dtng' => null,
            'jam_plng' => null,
            'ket' => 'Alfa',
            'bukti' => 'alfa.jpg',
        ]);

        Presence::create([
            'student_id' => '1',
            'nis' => '1190',
            'tgl' => '2021-11-22',
            'jam_dtng' => '07:00:00',
            'jam_plng' => '09:00:00',
            'ket' => null,
            'bukti' => null,
        ]);

        Presence::create([
            'student_id' => '2',
            'nis' => '11907423',
            'tgl' => '2021-11-23',
            'jam_dtng' => '09:00:00',
            'jam_plng' => '11:00:00',
            'ket' => null,
            'bukti' => null,
        ]);
    }
}
