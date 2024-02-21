<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class specialites extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'id_spec',
        'intitule_spec'
    ];

    /**
     * The roles that belong to the specialites
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function rendez()
    {
        return $this->hasMany(rendez_vous::class, 'role_user_table', 'user_id', 'role_id');
    }
}
