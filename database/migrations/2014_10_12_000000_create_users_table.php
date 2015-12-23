<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'users', function( Blueprint $table ) {
			$table->increments( 'id' );
			$table->unsignedInteger( 'media_id' )->index();
			$table->unsignedInteger( 'city_id' )->index();
			$table->unsignedInteger( 'region_id' )->index();
			$table->unsignedInteger( 'country_id' )->index();
			$table->string( 'first_name', 30 )->nullable();
			$table->string( 'last_name', 30 )->nullable();
			$table->text( 'about_me' )->nullable();
			$table->unsignedSmallInteger( 'birth_year' )->nullable();
			$table->string( 'username', 30 );
			$table->string( 'email' )->unique();
			$table->string( 'password', 60 );
			$table->rememberToken();
			$table->string( 'role' )->default( 'USER' );
			$table->string( 'address' )->nullable();
			$table->string( 'zip', 15 )->nullable();
			$table->decimal( 'latitude', 11, 8 )->nullable();
			$table->decimal( 'longitude', 11, 8 )->nullable();
			$table->string( 'phone', 30 )->nullable();
			$table->string( 'website' )->nullable();
			$table->string( 'facebook' )->nullable();
			$table->json( 'settings' );
			$table->json( 'payment' );
			$table->unsignedInteger( 'followers' )->default( '0' );
			$table->unsignedInteger( 'followings' )->default( '0' );
			$table->boolean( 'status' )->default( '0' );
			$table->timestamp( 'accessed_at' )->nullable();
			$table->timestamps();

		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop( 'users' );
	}
}
