<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAccountsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('accounts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('coin_id')->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('farm_id')->index()->nullable();
            $table->unsignedBigInteger('uplink_id')->index()->nullable();
            $table->double( 'uplink_cut' )->nullable();
            $table->double( 'coin_amount' );
            $table->double( 'usd_value_override' )->nullable();
            $table->timestamps();

            $table->foreign('uplink_id')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('coin_id')->references('id')->on('coins')->onDelete('restrict');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
            $table->foreign('farm_id')->references('id')->on('farms')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('accounts');
    }
}
