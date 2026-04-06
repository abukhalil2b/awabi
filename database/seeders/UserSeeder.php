<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

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
            'name' => 'الإدارة',
            'app' => 'super-admin',
            'phone' => '1',
            'password' => Hash::make('Xx@2024'),
            'plain_password' => 'Xx@2024'
        ]);

   
        User::create([
            'name' => 'الإدارة الجماهيرية',
            'app' => 'attendance-admin',
            'phone' => '3',
            'password' => Hash::make('2@24xx'),
            'plain_password' => '2@24xx'
        ]);
    }
}
