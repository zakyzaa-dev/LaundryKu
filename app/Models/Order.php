<?php

namespace App\Models;

use App\Enum\OrderStatus;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;
use Illuminate\Database\Eloquent\Attributes\Fillable;

#[Fillable('customer_id', 'service_id', 'token', 'weight', 'total_price', 'status', 'note')]
class Order extends Model
{
    protected $casts = [
        'status' => OrderStatus::class
    ];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function customer()
    {
        return $this->belongsTo(User::class);
    }
}
