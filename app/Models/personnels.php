<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class personnels extends Model
{
    use HasFactory;
    protected $fillable = [
        'id_pers',
        'nom',
        'email',
        'password',
        'roles_id'
    ];
}
