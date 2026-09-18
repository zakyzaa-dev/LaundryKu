<?php

namespace App\Models;

use App\Enum\OrderStatus;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;

class Order extends Model
{
    protected $casts = [
        'status' => OrderStatus::class
    ];

    public function service()
    {
        $this->belongsTo(Service::class);
    }

    public function transaction()
    {
        return $this->hasOne(Transaction::class);
    }
}
