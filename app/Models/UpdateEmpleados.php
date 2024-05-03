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
        'fk_usrCreated',
        'n_tarjeta',
    ];


    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class, 'fk_usrCreated');
    }

    public function emailRegistros()
    {
        return $this->hasMany(EmailRegistro::class, 'id_empleado');
    }

    public function correos()
    {
        return $this->hasMany(EmailRegistro::class, 'id_empleado');
    }
}
