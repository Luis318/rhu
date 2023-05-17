<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HorasExtras extends Model
{
    use HasFactory;
    public function empleado(){
        return $this->belongTo(Empleado::class);
    }
}
