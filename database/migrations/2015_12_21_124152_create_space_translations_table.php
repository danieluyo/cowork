<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSpaceTranslationsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'space_translations', function( Blueprint $table ) {
			$table->increments( 'id' );
			$table->unsignedInteger( 'space_id' )->index();
			$table->string( 'locale', 8 );
			$table->string( 'title' );
			$table->text( 'description' )->nullable();
			$table->text( 'equipments' )->nullable();
			$table->timestamps();

			$table->unique( [ 'space_id', 'locale' ] );
			$table->foreign( 'space_id' )->references( 'id' )->on( 'spaces' )->onDelete( 'cascade' );
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop( 'space_translations' );
	}
}
