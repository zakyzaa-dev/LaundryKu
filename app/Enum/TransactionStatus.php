<?php

namespace App\Enum;

enum TransactionStatus: string
{
    case Pending = "Pending";
    case Paid = "Paid";
    case Cancelled = "Cancelled";

    public function label() : string
    {
        return match($this)
        {
            self::Pending => "Menunggu dibayar",
            self::Paid => "Sudah dibayar",
            self::Cancelled  => "Transaksi dibatalkan"
        };
    }
}
