<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Venta;

class Cliente extends Model
{
    use HasFactory;

    public function sueldo()
    {
        $this->hasMany(Venta::class);
    }
}
