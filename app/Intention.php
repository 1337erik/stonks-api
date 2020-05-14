<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Intention extends Model
{
    protected $guarded = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'fulfill_by' => 'datetime',
    ];

    protected $appends = [
        'path'
    ];

    public function user()
    {
        return $this->belongsTo( User::class );
    }

    /**
     * The resource's path
     */
    public function getPathAttribute()
    {
        return "/api/intentions/{$this->id}";
    }

    /**
     * Scope for a specific user
    */
    public function scopeForUser( $query, $user_id )
    {
        $query->where( 'user_id', $user_id );
    }
}
