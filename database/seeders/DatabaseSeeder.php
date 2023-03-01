<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        User::create([
            'app' => 'admin',
            'phone' => '91171747',
            'email' => 'abukhalil2b@gmail.com',
            'password' => Hash::make('Ele@2023'),
        ]);

        require __DIR__ . '/students.php';

        foreach ($students as $student) {
            User::create([
                'app' => 'distance',
                'phone' => $student['phone'],
                'email' => $student['phone'] . '@gmail.com',
                'password' => Hash::make($student['phone']),
            ]);
        }

    }
}
