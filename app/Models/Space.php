<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Space
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $category_id
 * @property integer $city_id
 * @property integer $region_id
 * @property integer $country_id
 * @property boolean $type
 * @property integer $hourly_price
 * @property integer $daily_price
 * @property integer $monthly_price
 * @property boolean $max_number_of_people
 * @property integer $area
 * @property float $ratings
 * @property integer $impacts
 * @property string $address
 * @property string $zip
 * @property float $latitude
 * @property float $longitude
 * @property boolean $is_featured
 * @property boolean $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\SpaceTranslation[] $translations
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Space translatedIn( $locale = null )
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Space translated()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Space listsTranslations( $translationField )
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Space withTranslation()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Space whereTranslation( $key, $value, $locale = null )
 */
class Space extends Model {

	use Translatable;

	/**
	 * The attributes that are translatable.
	 *
	 * @var array
	 */
	public $translatedAttributes = [ 'title', 'description','equipments' ];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'venue_id',
		'category_id',
		'booking_method',
		'capacity',
		'hourly_price',
		'daily_price',
		'monthly_price',
		'area',
		'ratings',
		'impacts',
		'is_featured',
		'status',
		'title',
		'description',
		'equipments',
	];

	public function revenue(){
	    return $this->belongsTo(Venue::class);
	}

	public function category() {
		return $this->belongsTo( Category::class );
	}

	public function bookings() {
		return $this->hasMany( Booking::class );
	}

	public function media() {
		return $this->belongsToMany( Media::class )->withTimestamps();
	}

	public function tags() {
		return $this->belongsToMany( Tag::class )->withTimestamps();
	}

}
