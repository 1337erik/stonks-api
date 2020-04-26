<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $guarded = [];

    const CAN_COMMENT = 'comment';

    /**
     * Return the foundational seed permissions
     * 
     * @return array
     */
    public static function allPermissions()
    {
        return [
            self::CAN_COMMENT
        ];
    }

    public function user()
    {
        return $this->belongsToMany( User::class, 'user_permissions' );
    }
}
