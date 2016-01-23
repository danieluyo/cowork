<?php

use App\Models\AdminVenue;
use App\Models\CategoryTranslation;
use App\Models\ContactUs;
use App\Models\LabTranslation;
use App\Models\Message;
use App\Models\SpaceMedia;
use App\Models\SpaceTag;
use App\Models\TagTranslation;
use App\Models\UserFollowing;
use App\Models\WorkingHour;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {
	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		factory( AdminVenue::class, 11 )->create();
		factory( CategoryTranslation::class, 11 )->create();
		factory( ContactUs::class, 15 )->create();
		factory( SpaceMedia::class, 11 )->create();
		factory( LabTranslation::class, 15 )->create();
		factory( TagTranslation::class,11)->create();
		factory( WorkingHour::class,11)->create();
		factory( UserFollowing::class,40)->create();
		factory( SpaceTag::class,20)->create();
		factory( Message::class,50)->create();
	}
}
