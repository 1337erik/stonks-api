<?php

use App\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = Role::allRoles();
        foreach( $roles as $role ){
            Role::create([
                'type' => $role
            ]);
        }
    }
}
