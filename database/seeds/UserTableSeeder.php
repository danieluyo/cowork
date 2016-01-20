<?php

use App\Models\Space;
use App\Models\Media;
use App\Models\User;
use App\Models\Venue;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		factory( User::class, 5 )->create();
		factory( Venue::class, 1 )->create();
		factory( Space::class, 10 )->create();
		factory( Media::class, 10 )->create();
	}
}
