<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurrenciesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('currencies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('code',6);
            $table->string('symbol',8);
            $table->decimal('rate',13,4);
            $table->boolean('is_after_symbol')->nullable();
            $table->string('decimal_separator',3);
            $table->string('thousands_separator',3);
            $table->unsignedTinyInteger('used')->default('0');
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
        Schema::drop('currencies');
    }
}
