<?php

use App\Permission;
use App\Role;
use App\Timezone;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $erik = factory( User::class )->create([

            'name'     => 'Echo Romeo',
            'email'    => 'erikpwhite@gmail.com',
            'timezone' => Timezone::AMERICA_NEW_YORK,
            'password' => Hash::make( '1squidward' )
        ]);

        $erik->getsRole( Role::GOD );

        factory( User::class, 25 )
            ->create()
            ->each( function( $user ){

                $user->getsRole( Role::USER );
                $user->getsPermission( Permission::CAN_COMMENT );
        });
    }
}
