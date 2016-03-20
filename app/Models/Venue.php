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
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Venue whereId( $value )
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Venue whereName( $value )
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Venue whereCategoryId( $value )
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Venue whereLogo( $value )
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Venue whereCity( $value )
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Venue whereCountry( $value )
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Venue whereAddress( $value )
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Venue whereZip( $value )
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Venue whereLatitude( $value )
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Venue whereLongitude( $value )
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Venue whereTaxRate( $value )
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Venue whereCurrencyId( $value )
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Venue whereNumber( $value )
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Venue whereEmail( $value )
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Venue whereWebsite( $value )
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Venue whereCreatedAt( $value )
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Venue whereUpdatedAt( $value )
 * @mixin \Eloquent
 */
class Venue extends Model {

	/**
	 * The relations to eager load on every query.
	 *
	 * @var array
	 */
	protected $with = [ 'category', 'spaces' ];

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
		return $this->belongsToMany( User::class, 'admin_venues', 'venue_id', 'admin_id' )->withTimestamps();
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
