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
		'media_id'       => $faker->imageUrl( 128, 128 ),
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
        'role'           => "USER",
        'address'        => $faker->address,
        'zip'            => $faker->randomDigit,
        'latitude'       => $faker->latitude,
        'longitude'      => $faker->longitude,
        'phone'          => $faker->phoneNumber,
        'website'        => $faker->url,
        'facebook'       => $faker->url,
        'settings'       => "{}",
        'payment'        => "{}",
        'followers'      => $faker->randomDigit,
        'followings'     => $faker->randomDigit,
        'accessed_at'    => $faker->date(),
    ];
} );
