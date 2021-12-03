<?php

namespace Database\Seeders;

use App\Models\Student;
use Illuminate\Database\Seeder;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Student::create([
            'nis' => '1190',
            'nama' => 'student1',
            'rombel' => 'rombel1',
            'rayon' => 'rayon1',
            'username' => 'student1',
            'password' => bcrypt('student1'),
        ]);

        Student::create([
            'nis' => '11907423',
            'nama' => 'Nopaldo Nur Hidayat',
            'rombel' => 'RPL XII-4',
            'rayon' => 'Cisarua 3',
            'username' => 'nopaldo',
            'password' => bcrypt('nopaldo'),
        ]);
    }
}
