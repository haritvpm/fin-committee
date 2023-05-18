<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
            ],
            [
                'id'             => 2,
                'name'           => 'Counter 1',
                'email'          => 'c1@fin.com',
                'password'       => bcrypt('c1'),
                'remember_token' => null,
            ],
            [
                'id'             => 3,
                'name'           => 'Counter 2',
                'email'          => 'c2@fin.com',
                'password'       => bcrypt('c2'),
                'remember_token' => null,
            ],
            [
                'id'             => 4,
                'name'           => 'Counter 3',
                'email'          => 'c3@fin.com',
                'password'       => bcrypt('c3'),
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
