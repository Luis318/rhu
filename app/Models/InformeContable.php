<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class InformeContable extends Model
{
    use HasFactory;
        
        protected $table = 'informe_contables';
        protected $primaryKey = 'id';
        protected $fillable = [
            'fecha_inicio',
            'fecha_fin',
            'tipo_informe',
            'total_reporte',
            'detallecatalogos_id',
            'rubros_id'
        ]; 

        public function ultimoIdRegistrado()
        {
            $ultimoID = InformeContable::all()->last();
            return $ultimoID;
        }

        public function informes()
        {
            $informes = InformeContable::all();

            return $informes;
        }
}
