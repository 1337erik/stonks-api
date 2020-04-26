<?php

use App\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = Permission::allPermissions();
        foreach( $permissions as $permission ){
            Permission::create([
                'type' => $permission
            ]);
        }
    }
}
