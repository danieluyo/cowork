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
		'media_id'       => rand( 1, 10 ),
		'city_id'        => 564123,
		'region_id'      => 23334,
		'country_id'     => 233,
		'first_name'     => $faker->firstName,
		'last_name'      => $faker->lastName,
		'about_me'       => $faker->paragraph,
		'birth_year'     => $faker->year,
		'username'       => $faker->userName,
		'email'          => $faker->email,
		'password'       => bcrypt( "123456" ),
		'role'           => "ADMIN",
		'address'        => $faker->address,
		'zip'            => $faker->randomDigit,
		'latitude'       => $faker->latitude,
		'longitude'      => $faker->longitude,
		'phone'          => $faker->phoneNumber,
		'website'        => $faker->url,
		'facebook'       => $faker->url,
		'settings'       => "{}",
		'payment'        => json_encode( $faker->creditCardDetails ),
		'followers'      => $faker->randomDigit,
		'followings'     => $faker->randomDigit,
		'accessed_at'    => $faker->date(),
	];
} );


$factory->define( \App\Models\Venue::class, function( Faker\Generator $faker ) {
	return [
		'name'        => $faker->domainName,
		'category_id' => 1,
		'image_id'    => rand( 1, 10 ),
		'city'        => $faker->city,
		'country'     => $faker->country,
		'address'     => $faker->address,
		'zip'         => $faker->randomDigit,
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
		'venue_id'      => 1,
		'category_id'   => rand( 1, 3 ),
		'capacity'      => rand( 1, 10 ),
		'hourly_price'  => rand( 10, 30 ),
		'daily_price'   => rand( 50, 100 ),
		'monthly_price' => rand( 200, 500 ),
		'area'          => rand( 20, 150 ),
		'ratings'       => $faker->randomFloat( 30, 10 ),
		'impacts'       => rand( 0, 200 ),
	];
} );


$factory->define( \App\Models\AdminVenue::class, function( Faker\Generator $faker ) {
	return [
		'admin_id' => 1,
		'venue_id' => 1,
	];
} );

$factory->define( \App\Models\Media::class, function( Faker\Generator $faker ) {
	return [
		'original_name' => $faker->userName . $faker->fileExtension,
		'filename'      => $faker->imageUrl(),
	];
} );