<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWorkingHoursTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'working_hours', function( Blueprint $table ) {
			$table->increments( 'id' );
			$table->unsignedInteger( 'listing_id' );
			$table->unsignedTinyInteger( 'day' );
			$table->time( 'openings' );
			$table->time( 'closings' );
			$table->timestamps();

			$table->foreign('listing_id')->references('id')->on('listings')->onDelete('cascade');
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop( 'working_hours' );
	}
}
