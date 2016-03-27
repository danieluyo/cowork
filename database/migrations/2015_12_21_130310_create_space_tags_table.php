<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSpaceTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('space_tags', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('space_id')->index();
            $table->unsignedInteger('tag_id')->index();
            $table->timestamps();

            $table->foreign('space_id')->references('id')->on('spaces');
            $table->foreign('tag_id')->references('id')->on('tags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('space_tags');
    }
}
