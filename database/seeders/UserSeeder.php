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
                'role' => 'admin',
                'full_name' => "Admin",
                'address' => "Gawaran, RT 03, RW 01",
                'username' => "Admin",
                'password' => bcrypt('admin1234'),
                'phone' => "0854672932",
            ],
            [
                'role' => 'admin',
                'full_name' => "phamuy",
                'address' => "Melbourne, RT 03, RW 01",
                'username' => "phamuy1234",
                'password' => bcrypt('phampham1234'),
                'phone' => "98123793",
            ],
            // 4 Pelanggan baru:
            [
                'role' => 'pelanggan', // Ubah role sesuai kebutuhan (bisa 'pelanggan' atau 'customer')
                'full_name' => "Budi Santoso",
                'address' => "Jl. Mawar No. 12, Surakarta",
                'username' => "budisantoso",
                'password' => bcrypt('budi1234'),
                'phone' => "081234567890",
            ],
            [
                'role' => 'pelanggan',
                'full_name' => "Siti Aminah",
                'address' => "Jl. Melati Blok B. 4, Yogyakarta",
                'username' => "sitiaminah",
                'password' => bcrypt('siti1234'),
                'phone' => "082345678901",
            ],
            [
                'role' => 'pelanggan',
                'full_name' => "Ahmad Fauzi",
                'address' => "Jl. Kenanga No. 88, Semarang",
                'username' => "ahmadfauzi",
                'password' => bcrypt('fauzi1234'),
                'phone' => "083456789012",
            ],
            [
                'role' => 'pelanggan',
                'full_name' => "Dewi Lestari",
                'address' => "Jl. Diponegoro No. 45, Salatiga",
                'username' => "dewilestari",
                'password' => bcrypt('dewi1234'),
                'phone' => "084567890123",
            ],
        ];

        foreach($users as $user){
            User::create($user);
        }
    }
}
