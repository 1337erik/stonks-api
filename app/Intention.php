<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Intention extends Model
{
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo( User::class );
    }

    /**
     * Scope for a specific user
    */
    public function scopeForUser( $query, $user_id )
    {
        $query->where( 'user_id', $user_id );
    }
}
