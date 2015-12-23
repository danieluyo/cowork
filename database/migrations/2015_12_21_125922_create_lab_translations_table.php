<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLabTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lab_translations', function (Blueprint $table) {
            $table->increments( 'id' );
            $table->unsignedInteger( 'lab_id' )->index();
            $table->string( 'locale', 8 );
            $table->string( 'title' );
            $table->text( 'description' );
            $table->timestamps();
            
            $table->unique(['lab_id','locale']);
            $table->foreign('lab_id')->references('id')->on('labs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('lab_translations');
    }
}
