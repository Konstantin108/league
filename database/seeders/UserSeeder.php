<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
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
                'name' => 'Alex',
                'avatar_path' => 'users/62abce5625dft.png',
                'phone_number' => '89099409336'
            ],
            [
                'name' => 'Kostya',
                'avatar_path' => 'users/23fdf5dfr5423.jpg',
                'phone_number' => '89060744512'
            ],
            [
                'name' => 'Maxim',
                'avatar_path' => 'users/2ee24d56df15e.jpg',
                'phone_number' => '89099703222'
            ]
        ];
        DB::table('users')->insert($users);
    }
}
