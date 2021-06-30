<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

use App\Models\TblPuntuacion;
use App\Models\User;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class PuntuacionesImport implements ToModel, WithHeadingRow
{

    public function model(array $row)
    {
        
        return new TblPuntuacion([

            'user_id'  		=> $row['user_id'],
            'puntuacion' 	=> $row['puntuacion'],
        ]);
    }
}
