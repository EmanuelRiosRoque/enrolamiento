<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AreasImuebles extends Model
{
    use HasFactory;

    public $fillable = [
        'id_location',
        'emailResptor',
        'desc_location',
    ];

    public $timestamps = true;

}
