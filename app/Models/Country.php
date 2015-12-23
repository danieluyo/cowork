<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Country
 *
 * @property integer $id
 * @property integer $lang_id
 * @property integer $currency_id
 * @property string $name
 * @property string $alpha2_code
 * @property string $alpha3_code
 * @property integer $numeric_code
 * @property string $phone_code
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CountryTranslation[] $translations
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Country translatedIn($locale = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Country translated()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Country listsTranslations($translationField)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Country withTranslation()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Country whereTranslation($key, $value, $locale = null)
 */
class Country extends Model {
	use Translatable;

	/**
	 * The attributes that are translatable.
	 *
	 * @var array
	 */
	public $translatedAttributes = [ 'name'];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [ 'name'];
}
