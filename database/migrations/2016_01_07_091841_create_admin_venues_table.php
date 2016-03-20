<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdminVenuesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'admin_venues', function( Blueprint $table ) {
			$table->increments( 'id' );
			$table->unsignedInteger( 'admin_id' )->index();
			$table->unsignedInteger( 'venue_id' )->index();
			$table->timestamps();

			$table->foreign( 'admin_id' )->references( 'id' )->on( 'users' );
			$table->foreign( 'venue_id' )->references( 'id' )->on( 'venues' )->onDelete( 'cascade' );
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop( 'admin_venues' );
	}
}
