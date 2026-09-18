<?php

namespace App\Models;

use App\Enum\TransactionStatus;
use Illuminate\Database\Eloquent\Attributes\Guarded;
use Illuminate\Database\Eloquent\Model;
use App\Models\Order;

#[Guarded('id')]
class Transaction extends Model
{
    protected $casts = [
        'status' => TransactionStatus::class
    ];
    public function order()
    {
        $this->belongsTo(Order::class);
    }
}
