<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVenuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('venues', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->unsignedInteger( 'category_id' )->index();
            $table->unsignedInteger( 'image_id' )->index();// logo
            $table->string( 'city' )->nullable();
            $table->string( 'country' )->nullable();
            $table->string( 'address' )->nullable();
            $table->string( 'zip', 15 )->nullable();
            $table->decimal( 'latitude', 11, 8 )->nullable();
            $table->decimal( 'longitude', 11, 8 )->nullable();
            $table->string('tax_rate')->nullable();
            $table->unsignedInteger( 'currency_id' )->index()->default('54'); //USD
            $table->string('number')->nullable();
            $table->string('email')->nullable();
            $table->string('website')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('venues');
    }
}
