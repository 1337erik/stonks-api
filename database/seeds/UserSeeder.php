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

            'id'       => 1,
            'username' => 'Erik',
            'email'    => 'erikpwhite@gmail.com',
            'timezone' => Timezone::AMERICA_NEW_YORK,
            'password' => Hash::make( '1squidward' )
        ]);

        $erik->getsRole( Role::GOD );

        $carsten = factory( User::class )->create([

            'id'       => 2,
            'username' => 'Carsten',
            'email'    => 'erikpwhiteaa@gmail.com',
            'timezone' => Timezone::AMERICA_NEW_YORK,
            'password' => Hash::make( 'test123' )
        ]);

        $carsten->getsRole( Role::INVESTOR );
        $carsten->getsRole( Role::AFFILIATE );

        $lima = factory( User::class )->create([

            'id'       => 3,
            'username' => 'Caique',
            'email'    => 'erikddpwhite@gmail.com',
            'timezone' => Timezone::AMERICA_NEW_YORK,
            'password' => Hash::make( 'test123' )
        ]);

        $lima->getsRole( Role::INVESTOR );
        $lima->getsRole( Role::AFFILIATE );

        $charles = factory( User::class )->create([

            'id'       => 4,
            'username' => 'Charles',
            'email'    => 'eriaakpwhite@gmail.com',
            'timezone' => Timezone::AMERICA_NEW_YORK,
            'password' => Hash::make( 'test123' )
        ]);

        $charles->getsRole( Role::INVESTOR );

        $will = factory( User::class )->create([

            'id'       => 5,
            'username' => 'Squilliam',
            'email'    => 'erikasdpwhite@gmail.com',
            'timezone' => Timezone::AMERICA_NEW_YORK,
            'password' => Hash::make( 'test123' )
        ]);

        $will->getsRole( Role::INVESTOR );

        // factory( User::class, 25 )
        //     ->create()
        //     ->each( function( $user ){

        //         $user->getsRole( Role::USER );
        //         $user->getsPermission( Permission::CAN_COMMENT );
        // });
    }
}
