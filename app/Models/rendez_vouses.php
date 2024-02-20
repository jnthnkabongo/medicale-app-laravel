<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rendez_vous extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'patient_id',
        'users_id',
        'code_patient',
        'spec_id',
        'date_rdv',
        'status'
    ];
}