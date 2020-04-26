<?php

use App\UserRole;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Schema;

class CreateUserRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_roles', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger( 'user_id' );
            $table->unsignedBigInteger( 'role_id' );
            $table->string( 'status', 50 )->default( UserRole::STATUS_ACTIVE ); // suspended, temporarily granted, active.. etc
            $table->dateTime( 'status_effective_at' )->default( Carbon::now() );
            $table->unsignedInteger( 'status_duration' )->nullable(); // in seconds
            $table->timestamps();

            $table->foreign( 'user_id' )->references( 'id' )->on( 'users' )->onDelete( 'RESTRICT' );
            $table->foreign( 'role_id' )->references( 'id' )->on( 'roles' )->onDelete( 'RESTRICT' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_roles');
    }
}
