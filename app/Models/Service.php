<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Guarded;
use Illuminate\Database\Eloquent\Model;
use Override;

#[Guarded('id')]
class Service extends Model
{
    #[Override]
    protected function casts()
    {
        return [
            'created_at' => 'datetime',
        ];
    }

    public function orders()
    {
        $this->hasMany(Order::class);
    }
}
