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
    public function user()
    {
        return $this->belongsTo(User::class, 'users_id', 'id');
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

    /**
     * Get the user that owns the rendez
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function specialite()
    {
        return $this->belongsTo(specialites::class, 'spec_id', 'id_spec');
    }
}



