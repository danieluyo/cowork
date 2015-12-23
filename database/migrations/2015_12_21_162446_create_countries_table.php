<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCountriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('countries', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('lang_id')->index();
            $table->unsignedInteger('currency_id')->index();
            $table->string('name');
            $table->char('alpha2_code',2);
            $table->char('alpha3_code',3);
            $table->unsignedInteger('numeric_code');
            $table->string('phone_code',8);
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
        Schema::drop('countries');
    }
}
