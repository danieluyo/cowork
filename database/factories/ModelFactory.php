<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define( App\Models\User::class, function( Faker\Generator $faker ) {
	return [
		'remember_token' => str_random( 10 ),
		'first_name'     => $faker->firstName,
		'last_name'      => $faker->lastName,
		'about_me'       => $faker->paragraph,
		'birth_year'     => $faker->year,
		'username'       => $faker->userName,
		'email'          => $faker->email,
		'password'       => bcrypt( "123456" ),
		'role'           => "ADMIN",
		'city'           => $faker->city,
		'country'        => $faker->country,
		'address'        => $faker->address,
		'zip'            => $faker->postcode,
		'latitude'       => $faker->latitude,
		'longitude'      => $faker->longitude,
		'phone'          => $faker->phoneNumber,
		'website'        => $faker->url,
		'photo'          => $faker->imageUrl( 256, 256 ),
		'facebook'       => "https://facebook.com/" . $faker->userName,
		'settings'       => "{}",
		'payment'        => json_encode( $faker->creditCardDetails ),
		'followers'      => $faker->randomDigit,
		'followings'     => $faker->randomDigit,
		'accessed_at'    => $faker->date(),
	];
} );


$factory->define( \App\Models\Venue::class, function( Faker\Generator $faker ) {
	return [
		'name'        => $faker->company,
		'category_id' => 1,
		'logo'        => $faker->imageUrl( 256, 256 ),
		'city'        => $faker->city,
		'country'     => $faker->country,
		'address'     => $faker->address,
		'zip'         => $faker->postcode,
		'latitude'    => $faker->latitude,
		'longitude'   => $faker->longitude,
		'tax_rate'    => rand( 1, 100 ),
		'number'      => $faker->phoneNumber,
		'email'       => $faker->companyEmail,
		'website'     => $faker->url,
	];
} );

$factory->define( App\Models\Space::class, function( Faker\Generator $faker ) {
	return [
		'venue_id'      => rand( 1, 5 ),
		'category_id'   => rand( 1, 5 ),
		'capacity'      => rand( 1, 10 ),
		'hourly_price'  => rand( 10, 30 ),
		'daily_price'   => rand( 50, 100 ),
		'monthly_price' => rand( 200, 500 ),
		'area'          => rand( 20, 150 ),
		'ratings'       => $faker->randomFloat( 30, 10 ),
		'impacts'       => rand( 0, 200 ),
	];
} );

$factory->define( \App\Models\SpaceTranslation::class, function( Faker\Generator $faker ) {
	return [
		'space_id'    => factory( \App\Models\Space::class )->create()->id,
		'locale'      => 'en',
		'title'       => $faker->word,
		'description' => $faker->paragraph,
		'equipments'  => $faker->paragraph,
	];
} );

$factory->define( \App\Models\AdminVenue::class, function( Faker\Generator $faker ) {
	return [
		'admin_id' => factory( \App\Models\User::class )->create()->id,
		'venue_id' => factory( \App\Models\Venue::class )->create()->id,
	];
} );


$factory->define( \App\Models\Category::class, function( Faker\Generator $faker ) {
	return [ ];
} );
$factory->define( \App\Models\CategoryTranslation::class, function( Faker\Generator $faker ) {
	return [
		'category_id' => factory( \App\Models\Category::class )->create()->id,
		'locale'      => 'en',
		'title'       => $faker->word,
		'description' => $faker->paragraph,
	];
} );

$factory->define( \App\Models\Tag::class, function( Faker\Generator $faker ) {
	return [
		'user_id' => rand( 1, 10 ),
	];
} );
$factory->define( \App\Models\TagTranslation::class, function( Faker\Generator $faker ) {
	return [
		'tag_id'      => factory( \App\Models\Tag::class )->create()->id,
		'locale'      => 'en',
		'title'       => $faker->word,
		'description' => $faker->paragraph,
	];
} );

$factory->define( \App\Models\WorkingHour::class, function( Faker\Generator $faker ) {
	return [
		'venue_id' => rand( 1, 5 ),
		'day'      => rand( 1, 7 ),
		'openings' => '08:00',
		'closings' => '16:00',
	];
} );

$factory->define( \App\Models\UserFollowing::class, function( Faker\Generator $faker ) {
	return [
		'follower_id'  => rand( 1, 20 ),
		'following_id' => rand( 1, 20 ),
	];
} );

$factory->define( \App\Models\ContactUs::class, function( Faker\Generator $faker ) {
	return [
		'name'    => $faker->title . $faker->firstName . " " . $faker->lastName,
		'email'   => $faker->email,
		'content' => $faker->paragraphs( 3, true ),
	];
} );


$factory->define( \App\Models\Booking::class, function( Faker\Generator $faker ) {
	return [
		'user_id'  => factory( \App\Models\User::class )->create()->id,
		'space_id' => rand( 1, 5 ),
		'review'   => $faker->paragraphs( 2, true ),
		'is_lab'   => rand( 0, 1 ),
	];
} );
$factory->define( \App\Models\Lab::class, function( Faker\Generator $faker ) {
	return [
		'teacher_id'     => factory( \App\Models\User::class )->create( [ 'role' => 'TUTOR' ] )->id,
		'booking_id'     => factory( \App\Models\Booking::class )->create()->id,
		'photo'          => $faker->imageUrl(),
		'price'          => $faker->randomFloat( 2, 10, 500 ),
		'students_count' => rand( 2, 20 ),
	];
} );
$factory->define( \App\Models\LabTranslation::class, function( Faker\Generator $faker ) {
	return [
		'lab_id'      => factory( \App\Models\Lab::class )->create()->id,
		'locale'      => 'en',
		'title'       => $faker->word,
		'description' => $faker->paragraph,
	];
} );


$factory->define( \App\Models\SpaceMedia::class, function( Faker\Generator $faker ) {
	return [
		'space_id' => factory( \App\Models\SpaceTranslation::class )->create()->space_id,
		'media_id' => factory( \App\Models\Media::class )->create()->id,
	];
} );

$factory->define( \App\Models\Media::class, function( Faker\Generator $faker ) {
	return [
		'original_name' => $faker->word . '.png',
		'filename'      => $faker->imageUrl(),
	];
} );


$factory->define( \App\Models\SpaceTag::class, function( Faker\Generator $faker ) {
	return [
		'space_id' => rand( 1, 5 ),
		'tag_id'   => rand( 1, 5 ),
	];
} );

$factory->define( \App\Models\Message::class, function( Faker\Generator $faker ) {
	return [
		'from_id' => rand( 1, 30 ),
		'to_id'   => rand( 1, 30 ),
		'content' => $faker->paragraphs( 3, true ),
	];
} );