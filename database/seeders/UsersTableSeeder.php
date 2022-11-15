<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'id'                => 1,
                'name'              => 'Admin',
                'email'             => 'admin@admin.com',
                'password'          => bcrypt('password'),
                'remember_token'    => null,
            ],
            [
                'id'                => 2,
                'name'              => 'SKPA',
                'email'             => 'skpa@skpa.com',
                'password'          => bcrypt('password'),
                'remember_token'    => null,
            ],
        ];

        User::insert($users);
    }
}
