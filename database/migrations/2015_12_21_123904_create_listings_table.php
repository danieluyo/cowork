<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateListingsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'listings', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->unsignedInteger( 'user_id' )->index();
			$table->unsignedInteger( 'category_id' )->index();
			$table->unsignedInteger( 'city_id' )->index();
			$table->unsignedInteger( 'region_id' )->index();
			$table->unsignedInteger( 'country_id' )->index();
			$table->boolean( 'type' )->default( '0' );
			$table->unsignedMediumInteger( 'hourly_price' );
			$table->unsignedMediumInteger( 'daily_price' );
			$table->unsignedMediumInteger( 'monthly_price' );
			$table->unsignedTinyInteger( 'max_number_of_people' );
			$table->unsignedSmallInteger( 'area' );
			$table->decimal( 'ratings' ); // ratings = new_rating/(num_ratings+1) + avg_rating*(num_ratings/(num_ratings+1))
			$table->unsignedInteger( 'impacts' );
			$table->string( 'address' )->nullable();
			$table->string( 'zip', 15 )->nullable();
			$table->decimal( 'latitude', 11, 8 )->nullable();
			$table->decimal( 'longitude', 11, 8 )->nullable();
			$table->boolean( 'is_featured' )->nullable();
			$table->boolean( 'status' )->default( '0' );
			$table->timestamps();

			$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop( 'listings' );
	}
}
