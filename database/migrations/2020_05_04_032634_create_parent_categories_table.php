<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParentCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parent_categories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger( 'child_category_id' );
            $table->unsignedBigInteger( 'parent_category_id' );
            $table->timestamps();

            $table->foreign( 'child_category_id' )->references( 'id' )->on( 'categories' )->onDelete( 'CASCADE' );
            $table->foreign( 'parent_category_id' )->references( 'id' )->on( 'categories' )->onDelete( 'CASCADE' );
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parent_categories');
    }
}
