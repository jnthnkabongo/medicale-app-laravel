<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class plaintes extends Model
{
    use HasFactory;
    protected $fillablw =
    [
        'intitule_plainte'
    ];

    /**
     * The roles that belong to the plaintes
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function user()
    {
        return $this->belongsToMany(User::class, 'role_user_table', 'user_id', 'role_id');
    }
}
