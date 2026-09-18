<?php

namespace App\Enum;

use function PHPUnit\Framework\matches;

enum OrderStatus: string
{
    case Diterima = "Diterima";
    case Diproses = "Diproses";
    case Selesai = "Selesai";
    case Diambil = "Diambil";

    public function label() : string
    {
        return match($this)
        {
            self::Diterima => "Laundry diterima",
            self::Diproses => "Laundry sedang diproses",
            self::Selesai => "Laundry selesai dicuci",
            self::Diambil => "Laundry telah diambil pelanggan"
        };
    }
}
