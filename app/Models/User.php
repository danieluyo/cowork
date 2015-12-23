<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;


/**
 * App\Models\User
 *
 * @property integer $id
 * @property integer $media_id
 * @property integer $city_id
 * @property integer $region_id
 * @property integer $country_id
 * @property string $first_name
 * @property string $last_name
 * @property string $about_me
 * @property integer $birdh_year
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property string $role
 * @property string $address
 * @property string $zip
 * @property double $latitude
 * @property double $longitude
 * @property string $phone
 * @property string $website
 * @property string $facebook
 * @property string $settings
 * @property string $payment
 * @property integer $followers
 * @property integer $followings
 * @property integer $status
 * @property \Carbon\Carbon $accessed_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class User extends Authenticatable {

	/**
	 * The attributes that should be casted to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'settings' => 'array',
		'payment'  => 'array',
		'status'   => 'boolean',
	];

	/**
	 * The attributes that should be mutated to dates.
	 *
	 * @var array
	 */
	protected $dates = [ 'accessed_at' ];
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'media_id',
		'city_id',
		'region_id',
		'country_id',
		'first_name',
		'last_name',
		'about_me',
		'birth_year',
		'username',
		'email',
		'password',
		'remember_token',
		'role',
		'address',
		'zip',
		'latitude',
		'longitude',
		'phone',
		'website',
		'facebook',
		'settings',
		'payment',
		'followers',
		'followings',
		'status',
		'accessed_at',
	];


	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = [ 'password', 'remember_token' ];

	/**
	 * Get the user's role all capitalized.
	 *
	 * @param  string $value
	 *
	 * @return string
	 */
	public function getRoleAttribute( $value ) {
		return strtoupper( $value );
	}

	/**
	 * Get the user's first name capitalized.
	 *
	 * @param  string $value
	 *
	 * @return string
	 */
	public function getFirstNameAttribute( $value ) {
		return ucfirst( $value );
	}

	/**
	 * Get the user's last name capitalized.
	 *
	 * @param  string $value
	 *
	 * @return string
	 */
	public function getLastNameAttribute( $value ) {
		return ucfirst( $value );
	}
}
