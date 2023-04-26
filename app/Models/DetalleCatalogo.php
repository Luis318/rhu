<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCatalogo extends Model
{
    use HasFactory;

     protected $fillable = [
        'monto_cuenta',
        'cuentas_id',
        'periodos_id',
        'empresas_id',
        'informecontable_id'
    ];
}
