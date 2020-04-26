<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = [];

    const GOD = 'god';
    const ADMIN = 'admin';
    const COACH = 'coach';
    const AUTHOR = 'author';
    const MODERATOR = 'moderator';
    const EDITOR = 'editor';
    const USER = 'user';

    public static function allRoles(){

        return [

            self::GOD,
            self::ADMIN,
            self::COACH,
            self::AUTHOR,
            self::MODERATOR,
            self::EDITOR,
            self::USER
        ];
    }

    public function user()
    {
        return $this->belongsToMany( User::class, 'user_roles' );
    }
}
