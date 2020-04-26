<?php

use App\Managers\RoleManager;
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
        foreach( Role::allRoles() as $role ){
            Role::create([
                'type' => $role
            ]);
        }
    }
}
