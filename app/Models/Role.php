<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Guarded;
use Illuminate\Database\Eloquent\Model;

#[Guarded('id')]
class Role extends Model
{
    public function users()
    {
        return $this->hasMany(User::class);
    }
}
