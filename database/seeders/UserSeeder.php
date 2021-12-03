<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Admin 1',
            'username' => 'admin1',
            'role' => 'admin',
            'password' => bcrypt('admin1'),
        ]);
    
        User::create([
            'name' => 'Student 1',
            'username' => 'student1',
            'role'  => 'student',
            'password' => bcrypt('student1'),
        ]);
        
        User::create([
            'name' => 'Nopaldo Nur Hidayat',
            'username' => 'nopaldo',
            'role'  => 'student',
            'password' => bcrypt('nopaldo'),
        ]);
    }
}
