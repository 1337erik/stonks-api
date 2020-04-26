<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserRole extends Model
{
    protected $guarded = [];

    const STATUS_ACTIVE = 'active';
    const STATUS_GRANTED = 'granted';
    const STATUS_SUSPENDED = 'suspended';

    /**
     * 
     * This should calculate the 'status_duration' column, which is in seconds, and return the date effective until
     */ 
    public function getStatusEffectiveUntilAttribute()
    {
        return 'yeet lmfao';
    }
}
