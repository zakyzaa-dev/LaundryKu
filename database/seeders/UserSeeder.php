<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'role_id' => 2,
                'full_name' => "Admin",
                'address' => "Gawaran, RT 03, RT 01",
                'username' => "Admin",
                'password' => bcrypt('admin1234'),
                'phone' => "0854672932",
            ],
            [
                'role_id' => 1,
                'full_name' => "phamuy",
                'address' => "Melbourne, RT 03, RT 01",
                'username' => "phamuy1234",
                'password' => bcrypt('phampham1234'),
                'phone' => "98123793",
            ],
        ];

        foreach($users as $user){
            User::create($user);
        }
    }

}
