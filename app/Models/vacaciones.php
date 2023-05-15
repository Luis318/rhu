<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class vacaciones extends Model
{
    use HasFactory;

    public function empleados(){
        
        return $this->belongsTo(Empleados::class);
    }
}
