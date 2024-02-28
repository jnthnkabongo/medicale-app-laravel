<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class patient_examen extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'patient_id',
        'examen_id',
        'users_id',
    ];

    /**
     * The roles that belong to the User
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function pat_exam_examen()
    {
        return $this->hasMany(examens::class, 'patient_id','exam_id','users_id');
    }
}
