<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoCuenta extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'rubro_id',
    ];

    public function cuentasBalance()
    {
        $cuentas = TipoCuenta::where('id','<',6)->get();
        return $cuentas;
    }
}
