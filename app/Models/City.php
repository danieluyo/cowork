<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\City
 *
 * @property integer $id
 * @property integer $region_id
 * @property integer $timezone_id
 * @property string $name
 * @property integer $population
 * @property float $latitude
 * @property float $longitude
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CityTranslation[] $translations
 * @method static \Illuminate\Database\Query\Builder|\App\Models\City translatedIn( $locale = null )
 * @method static \Illuminate\Database\Query\Builder|\App\Models\City translated()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\City listsTranslations( $translationField )
 * @method static \Illuminate\Database\Query\Builder|\App\Models\City withTranslation()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\City whereTranslation( $key, $value, $locale = null )
 */
class City extends Model {
	use Translatable;

	/**
	 * The attributes that are translatable.
	 *
	 * @var array
	 */
	public $translatedAttributes = [ 'name' ];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [ 'name' ];
}
