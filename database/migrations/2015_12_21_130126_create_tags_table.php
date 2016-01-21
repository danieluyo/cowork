<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTagsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'tags', function( Blueprint $table ) {
			$table->increments( 'id' );
			$table->string( 'type' )->default( 'amenity' ); // or 'custom_amenity'
			$table->unsignedInteger('user_id')->nullable(); //if type=custom,this = user_id
			$table->timestamps();

			$table->foreign('user_id')->references('id')->on('users');
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop( 'tags' );
	}
}
