<?php

namespace App\Enum;

use function PHPUnit\Framework\matches;

enum OrderStatus: string
{
    case Menunggu = "Menunggu";
    case Diterima = "Diterima";
    case Diproses = "Diproses";
    case Selesai = "Selesai";
    case Diambil = "Diambil";

    public function label() : string
    {
        return match($this)
        {
            self::Menunggu => "Menunggu konfirmasi",
            self::Diterima => "Laundry diterima",
            self::Diproses => "Laundry sedang diproses",
            self::Selesai => "Laundry selesai dicuci",
            self::Diambil => "Laundry telah diambil pelanggan"
        };
    }

    public static function stepperCases(): array
    {
        return [
            self::Menunggu,
            self::Diterima,
            self::Diproses,
            self::Selesai,
            self::Diambil,
        ];
    }

    public function isPassed(?self $currentStatus): bool
    {
        if (!$currentStatus) return false;

        $cases = self::stepperCases();
        $stepIndex = array_search($this, $cases, true);
        $currentIndex = array_search($currentStatus, $cases, true);

        return $currentIndex !== false && $stepIndex <= $currentIndex;
    }
}
