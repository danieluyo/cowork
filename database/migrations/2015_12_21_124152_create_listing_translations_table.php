<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateListingTranslationsTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'listing_translations', function( Blueprint $table ) {
			$table->increments( 'id' );
			$table->unsignedInteger( 'listing_id' )->index();
			$table->string( 'locale', 8 );
			$table->string( 'title' );
			$table->text( 'description' );
			$table->timestamps();

			$table->unique(['listing_id','locale']);
			$table->foreign('listing_id')->references('id')->on('listings')->onDelete('cascade');
		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop( 'listing_translations' );
	}
}
