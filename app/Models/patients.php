<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class patients extends Model
{
    use HasFactory;
    protected $fillable = [
        'code_patient',
        'nom',
        'email',
        'contact',
        'datenais',
        'adresse',
        'note'
    ];

    public function rendez()
    {
        return $this->hasMany(rendez_vous::class);
    }
}
