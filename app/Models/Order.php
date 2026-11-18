<?php

namespace App\Models;

use App\Enum\OrderStatus;
use Illuminate\Database\Eloquent\Model;
use App\Models\Service;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Override;

#[Fillable('customer_id', 'service_id', 'token', 'weight', 'total_price', 'status', 'note')]
class Order extends Model
{
    #[Override]
    protected function casts()
    {
        return [
            'status' => OrderStatus::class,
            'created_at' => 'datetime',
            'updated_at' => 'datetime',
        ];
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function customer()
    {
        return $this->belongsTo(User::class);
    }
}
