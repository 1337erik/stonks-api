<?php

namespace App;

use App\Managers\UserManager;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens, Billable, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $guarded = [
        'id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * 
     */
    public function roles()
    {
        return $this->belongsToMany( Role::class, 'user_roles' )
            ->withTimestamps()
            ->withPivot([
                'status',
                'status_effective_at',
                'status_duration'
            ]);
    }

    /**
     * 
     */
    public function permissions()
    {
        return $this->belongsToMany( Permission::class, 'user_permissions' )
            ->withTimestamps()
            ->withPivot([
                'status',
                'status_effective_at',
                'status_duration'
            ]);
    }

    /**
     * 
     * @param string $type
     * 
     * @return void
     */
    public function getsRole( string $type )
    {
        $ro = new UserManager();
        $ro->giveRoleTo( $type, $this );
    }

    /**
     * @param string $type
     * 
     * @return void
     */
    public function getsPermission( $type )
    {
        $ro = new UserManager();
        $ro->givePermissionTo( $type, $this );
    }

    /**
     * Checks if a relationwhip exists, by role type
     * 
     * @param string $type
     * 
     * @return bool
     */
    public function hasRole( $type )
    {
        Role::where( 'type', $type )->firstOrFail();
        return $this->roles()->where( 'type', $type )->exists();
    }

    /**
     * Checks if a relationwhip exists, by permission type
     * 
     * @param string $type
     * 
     * @return bool
     */
    public function hasPermission( $type )
    {
        Permission::where( 'type', $type )->firstOrFail();
        return $this->permissions()->where( 'type', $type )->exists();
    }
}
