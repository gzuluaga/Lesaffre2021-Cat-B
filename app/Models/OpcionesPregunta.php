<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OpcionesPregunta extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'id_pregunta' => 'integer',
        'criterio' => 'boolean',
        'estado' => 'boolean',
    ];


    public function idPregunta()
    {
        return $this->belongsTo(\App\Models\IdPregunta::class);
    }
}
