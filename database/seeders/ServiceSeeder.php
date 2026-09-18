<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\Service;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $services = [
            [
                'service_name' => 'Laundry Reguler',
                'slug'         => Str::slug('Laundry Reguler'),
                'description'  => 'Cuci, kering, lipat rapi dengan aroma wangi segar.',
                'price_per_kg' => 7000.00,
                'duration'     => '2 Hari',
            ],
            [
                'service_name' => 'Laundry Express',
                'slug'         => Str::slug('Laundry Express'),
                'description'  => 'Pengerjaan kilat prioritas, selesai dalam hitungan jam.',
                'price_per_kg' => 13000.00,
                'duration'     => '1 Hari / Kilat',
            ],
            [
                'service_name' => 'Setrika Saja',
                'slug'         => Str::slug('Setrika Saja'),
                'description'  => 'Penyetrikaan profesional & licin, plus bonus hanger.',
                'price_per_kg' => 6000.00,
                'duration'     => '1 Hari',
            ],
        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}
