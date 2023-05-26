<?php

namespace Database\Seeders;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $user = [
            [   
                'name'=>'Admin',
                'email'=>'admin@itsolutionstaff.com',
                // 'is_admin'=>'1',
                'role' => '0',
                'password'=> bcrypt('123456'),
            ],
            [
                'name'=>'User',
                'email'=>'user@itsolutionstaff.com',
                //'is_admin'=>'0',
                'role' => '1',
                'password'=> bcrypt('123456'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }

    }
}
