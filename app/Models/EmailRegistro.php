<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmailRegistro extends Model
{
    use HasFactory;

    public $fillable = [
        'id_empleado',
        'emailResptor',
        'nombreDocumento',
        'fk_userEmisor',
    ];

    public $timestamps = true;

    public function user()
    {
        return $this->belongsTo(User::class, 'fk_userEmisor');
    }

    public function updateEmpleado()
    {
        return $this->belongsTo(UpdateEmpleados::class, 'id_empleado');
    }
}
