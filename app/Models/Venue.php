<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Venue
 *
 * @property integer $id
 * @property string $name
 * @property integer $category_id
 * @property string $logo
 * @property string $city
 * @property string $country
 * @property string $address
 * @property string $zip
 * @property float $latitude
 * @property float $longitude
 * @property boolean $tax_rate
 * @property integer $currency_id
 * @property string $number
 * @property string $email
 * @property string $website
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\User[] $admins
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Space[] $spaces
 * @property-read \App\Models\Category $category
 * @property-read \App\Models\Currency $currency
 */
class Venue extends Model {

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
		'category_id',
		'logo',
		'city',
		'country',
		'address',
		'zip',
		'latitude',
		'longitude',
		'tax_rate',
		'tax_rate',
		'currency_id',
		'number',
		'email',
		'website',
	];

	public function admins() {
		return $this->belongsToMany( User::class, 'admin_venues', 'admin_id', 'id' )->withTimestamps();
	}

	public function spaces() {
		return $this->hasMany( Space::class );
	}

	public function category() {
		return $this->belongsTo( Category::class );
	}

	public function currency() {
		return $this->belongsTo( Currency::class );
	}
}
