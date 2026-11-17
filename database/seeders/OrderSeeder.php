<?php

namespace Database\Seeders;

use App\Enum\OrderStatus;
use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $order = [
            [
                'customer_id' => 1,
                'service_id' => 2,
                'token' => 'testingABC',
                'weight' => 3,
                'total_price' => 15000,
                'status' => OrderStatus::Diproses,
                'note' => 'Mas nanti kalo ketemu uang di saku celana boleh disimpen aja buat masnya, saya ikhlas'
            ],
            [
                'customer_id' => 2,
                'service_id' => 1,
                'token' => 'testingABCD',
                'weight' => 5.6,
                'total_price' => 19000,
                'status' => OrderStatus::Selesai,
                'note' => null // Note kosong
            ],
            // 3 Orderan tambahan baru:
            [
                'customer_id' => 3,
                'service_id' => 1,
                'token' => 'testingXYZ1',
                'weight' => 4.0,
                'total_price' => 20000,
                'status' => OrderStatus::Diproses,
                'note' => 'Jangan dicampur dengan pakaian putih ya mas'
            ],
            [
                'customer_id' => 1,
                'service_id' => 3,
                'token' => 'testingXYZ2',
                'weight' => 2.5,
                'total_price' => 25000,
                'status' => OrderStatus::Selesai,
                // Note dikosongkan (tanpa key note atau null)
            ],
            [
                'customer_id' => 4,
                'service_id' => 2,
                'token' => 'testingXYZ3',
                'weight' => 7.2,
                'total_price' => 36000,
                'status' => OrderStatus::Diproses,
                'note' => null
            ],
        ];

        foreach ($order as $item) {
            Order::create($item);
        }
    }
}
