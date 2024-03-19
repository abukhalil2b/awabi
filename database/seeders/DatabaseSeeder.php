<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Cate;
use App\Models\Permission;
use App\Models\Question;
use App\Models\Role;
use App\Models\State;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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
            'name' => 'الإدارة',
            'app' => 'super-admin',
            'phone' => '1',
            'password' => Hash::make('Xx@2024'),
            'plain_password' => 'Xx@2024'
        ]);

        User::create([
            'name' => 'الإدارة عن بعد',
            'app' => 'distance-admin',
            'phone' => '2',
            'password' => Hash::make('2@24xx'),
            'plain_password' => '2@24xx'
        ]);

        User::create([
            'name' => 'الإدارة الجماهيرية',
            'app' => 'attendance-admin',
            'phone' => '3',
            'password' => Hash::make('2@24xx'),
            'plain_password' => '2@24xx'
        ]);

        /** - - - - - attendance students - - - - - - - -  */
        require __DIR__ . '/attendance_students.php';
        foreach ($attendances as $attendance) {
            $randPass = rand(100000,999999);
            User::create([
                'app' => 'attendance',
                'name' => $attendance['name'],
                'phone' => $attendance['phone'],
                'password' => Hash::make($randPass),
                'plain_password' => $randPass
            ]);
        }

        /** - - - - - students - - - - - - - -  */
        require __DIR__ . '/students.php';

        foreach ($students as $student) {
            User::create([
                'app' => 'distance',
                'phone' => $student['phone'],
                'password' => Hash::make($student['phone']),
                'plain_password' => $student['phone']
            ]);
        }

        /** - - - - - cates - - - - - - - -  */
        require __DIR__ . '/cates.php';

        foreach ($cates as $cate) {

            Cate::create([
                'title' => $cate['title'],
                'app' => $cate['app'],
                'status' => $cate['status']
            ]);
        }

        /** - - - - - states - - - - - - - -  */
        require __DIR__ . '/states.php';

        foreach ($states as $state) {

            State::create([
                'name' => $state,
            ]);
        }


        // /** - - - - - - questions - - - - - - -  */
        require __DIR__ . '/questions.php';

        foreach ($questions as $question) {

            Question::create([
                'content' => $question['content'],
                'A' => $question['op1'],
                'B' => $question['op2'],
                'C' => $question['op3'],
                'D' => $question['op3'],
                'ans' => 'A',
                'cate_id' => 1,
            ]);
        }

        /** - - - - - - permissions - - - - - - -  */
        require __DIR__ . '/permissions.php';

        foreach ($permissions as $permission) {

            Permission::create([
                'title' => $permission['title'],
                'slug' => $permission['slug'],
                'cate' => $permission['cate']
            ]);
        }

        /** - - - - - - roles - - - - - - -  */
        require __DIR__ . '/roles.php';

        foreach ($roles as $role) {

            Role::create([
                'title' => $role['title'],
            ]);
        }

        DB::table('role_user')->insert([
            'role_id' => 1,
            'user_id' => 2, //distance-admin
        ]);

        DB::table('role_user')->insert([
            'role_id' => 2,
            'user_id' => 3, //attendance-admin
        ]);
    }
}
