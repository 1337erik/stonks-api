<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {

            $table->id();
            $table->unsignedBigInteger( 'user_id' );
            $table->unsignedBigInteger( 'coin_id' );
            $table->unsignedBigInteger( 'farm_id' )->nullable();
            // $table->unsignedBigInteger( 'account_id' );
            $table->string( 'type', 255 );
            $table->double( 'coin_amount' )->nullable();
            $table->double( 'usd_value' );
            $table->integer( 'recorded_apr' )->nullable();
            $table->dateTime( 'effective_date' );
            $table->timestamps();

            $table->foreign( 'user_id' )->references( 'id' )->on( 'users' )->onDelete( 'RESTRICT' );
            // $table->foreign( 'account_id' )->references( 'id' )->on( 'accounts' )->onDelete( 'RESTRICT' );
            $table->foreign( 'coin_id' )->references( 'id' )->on( 'coins' )->onDelete( 'RESTRICT' );
            $table->foreign( 'farm_id' )->references( 'id' )->on( 'farms' )->onDelete( 'RESTRICT' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
