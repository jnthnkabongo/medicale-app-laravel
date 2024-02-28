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

     /**
     * The roles that belong to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function exam_patient_exam()
    {
        return $this->belongsTo(patient_examen::class);
    }
}
