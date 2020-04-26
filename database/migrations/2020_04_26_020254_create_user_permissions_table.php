<?php

use App\UserPermission;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;

class CreateUserPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_permissions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger( 'user_id' );
            $table->unsignedBigInteger( 'permission_id' );
            $table->string( 'status', 50 )->default( UserPermission::STATUS_ACTIVE );
            $table->dateTime( 'status_effective_at' )->default( Carbon::now() );
            $table->unsignedInteger( 'status_duration' )->nullable();
            $table->timestamps();
            $table->foreign( 'user_id' )->references( 'id' )->on( 'users' )->onDelete( 'RESTRICT' );
            $table->foreign( 'permission_id' )->references( 'id' )->on( 'permissions' )->onDelete( 'RESTRICT' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_permissions');
    }
}
