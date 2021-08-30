<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = [];

    // TODO add roles to its own enum
    const GOD = 'god';
    const AFFILIATE = 'affiliate';
    const INVESTOR = 'investor';

    /**
     * Return the white-list of possible roles
     * 
     * @return array
     */
    public static function allRoles()
    {
        return [

            self::GOD,
            self::AFFILIATE,
            self::INVESTOR,
        ];
    }

    public function user()
    {
        return $this->belongsToMany( User::class, 'user_roles' );
    }
}
