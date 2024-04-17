<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UpdateEmpleados extends Model
{
    use HasFactory;

    public $fillable = [
        'nuM_EMPL',
        'nombres',
        'apellidop',
        'apellidom',
        'estatus',
        'rfc',
        'curp',
        'areA_ADSCRIPCION',
        'descripcioN_AREA_ADSCRIPCION',
        'puesto',
        'descripcioN_PUESTO',
        'ubicacioN_AREA_TRABAJO',
        'descripcioN_AREA_TRABAJO',
        'nivel',
        'plaza',
    ];

    public $timestamps = false;
}
