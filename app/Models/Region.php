<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Region
 *
 * @property integer $id
 * @property integer $country_id
 * @property string $name
 * @property string $code
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\RegionTranslation[] $translations
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Region translatedIn($locale = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Region translated()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Region listsTranslations($translationField)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Region withTranslation()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Region whereTranslation($key, $value, $locale = null)
 */
class Region extends Model {
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
	protected $fillable = [ 'country_id', 'name', 'code' ];
}
