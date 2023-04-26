<?php

namespace App\Imports;

use App\Models\InformeContable;
use Maatwebsite\Excel\Concerns\ToModel;

class InformeImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new InformeContable([
            //
        ]);
    }
}
