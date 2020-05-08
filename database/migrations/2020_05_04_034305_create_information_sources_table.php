<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInformationSourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('information_sources', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger( 'information_id' );
            $table->unsignedBigInteger( 'source_id' );
            $table->timestamps();

            $table->foreign( 'information_id' )->references( 'id' )->on( 'information' )->onDelete( 'CASCADE' );
            $table->foreign( 'source_id' )->references( 'id' )->on( 'sources' )->onDelete( 'CASCADE' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('information_sources');
    }
}
