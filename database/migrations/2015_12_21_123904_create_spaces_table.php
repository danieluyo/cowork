<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSpacesTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'spaces', function( Blueprint $table ) {
			$table->increments( 'id' );
			$table->unsignedInteger( 'venue_id' )->index();
			$table->unsignedInteger( 'category_id' )->index();
			$table->boolean( 'booking_method' )->default( '0' );
			//0:normal, 1:VPOS, 2: instant booking: no need for approval, 3: 1+2
			$table->unsignedTinyInteger( 'capacity' );
			$table->unsignedMediumInteger( 'hourly_price' );
			$table->unsignedMediumInteger( 'daily_price' );
			$table->unsignedMediumInteger( 'monthly_price' );
			$table->unsignedSmallInteger( 'area' );
			$table->decimal( 'ratings' );
			// ratings = new_rating/(num_ratings+1) + avg_rating*(num_ratings/(num_ratings+1))
			$table->unsignedInteger( 'impacts' );

			$table->boolean( 'is_featured' )->nullable();
			$table->boolean( 'status' )->default( '1' ); //1:public,2:private(manager = teacher),0:suspended
			$table->timestamps();

			$table->foreign( 'venue_id' )->references( 'id' )->on( 'venues' )->onDelete( 'cascade' );
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop( 'spaces' );
	}
}
