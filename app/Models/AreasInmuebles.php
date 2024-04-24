<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreasInmuebles extends Model
{
    use HasFactory;
    public $fillable = [
        'id_locacion',
        'desc_locacion'
    ];
}
