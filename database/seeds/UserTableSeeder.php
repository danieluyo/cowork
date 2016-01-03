<?php

use App\Models\Listing;
use App\Models\Media;
use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		factory( User::class, 10 )->create();
		factory( Listing::class, 10 )->create();
		factory( Media::class, 10 )->create();
	}
}
