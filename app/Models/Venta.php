<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;
use App\Models\Producto;

class Venta extends Model
{
    use HasFactory;

    public function personal()
    {
      $this->BelongsTo(Cliente::class);
      $this->BelongsTo(Producto::class);
    }
}
