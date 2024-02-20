<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rendez extends Model
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


    /**
     * Get the user that owns the rendez
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function utilisateur()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the user that owns the rendez
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function patient()
    {
        return $this->belongsTo(patients::class);
    }

    public function specialite()
    {
        return $this->belongsTo(specialites::class);
    }
}



