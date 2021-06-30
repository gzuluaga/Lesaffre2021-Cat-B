<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use App\Models\User;

class UsersExport implements FromCollection
{
   	

    public function collection()
    {
         return User::where('tipo_user','Proveedor')
                    ->where('estado_usr',1)
                    ->select('id','name','email','alias')
                    ->get();

    }
}
