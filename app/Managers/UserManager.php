<?php

namespace App\Managers;

use App\Permission;
use App\Role;
use App\User;

class UserManager
{

    protected $user;

    /**
     * Sets the stage
     */
    public function __construct()
    {

    }

    /**
     * Specify a role by type and a receiver
     * 
     * @param string $type
     * @param User $receiver
     * 
     * @return void
     */
    public function giveRoleTo( string $type, User $receiver )
    {
        $role = Role::where( 'type', $type )->firstOrFail();
        $receiver->roles()->attach( $role->id );
    }

    /**
     * Specify a permission by type and a receiver
     * 
     * @param string $type
     * @param User $receiver
     * 
     * @return void
     */
    public function givePermissionTo( string $type, User $receiver )
    {
        $permission = Permission::where( 'type', $type )->firstOrFail();
        $receiver->permissions()->attach( $permission->id );
    }
}