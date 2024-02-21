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
        'etat_consult',
        'adresse',
        'note'
    ];

     /**
     * Get the user that owns the employers
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function plainte()
    {
        return $this->belongsTo(plaintes::class);
    }

      /**
     * Get the user that owns the employers
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function roles()
    {
        return $this->belongsTo(roles::class);
    }

    public function AllDuJour($query)
    {
        return $query->whereDate('created_at', today());
    }


}
