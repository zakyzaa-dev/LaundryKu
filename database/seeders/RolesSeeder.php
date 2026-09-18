<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create([
            'role_name' => 'Pelanggan',
            'description' => 'Role yang dipake pelanggan'
        ]);

        Role::create([
            'role_name' => 'Admin',
            'description' => 'Role yang dipake admin'
        ]);
    }
}
