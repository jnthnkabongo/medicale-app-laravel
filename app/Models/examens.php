<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class examens extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'intitule_examen'
    ];
}
