<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'safae',
                'email' => 'safae@gmail.com',
                'is_super_admin' => '1',
                'is_admin' => '0',
                'password' =>   bcrypt('123456789'),
            ],
            [
                'name' => 'test',
                'email' => 'test@gmail.com',
                'is_super_admin' => '0',
                'is_admin' => '1',
                'password' =>   bcrypt('123456789'),
            ],

        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
