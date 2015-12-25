<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Tag
 *
 * @property integer $id
 * @property string $type
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\TagTranslation[] $translations
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tag translatedIn( $locale = null )
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tag translated()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tag listsTranslations( $translationField )
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tag withTranslation()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tag whereTranslation( $key, $value, $locale = null )
 */
class Tag extends Model {
	use Translatable;

	/**
	 * The attributes that are translatable.
	 *
	 * @var array
	 */
	public $translatedAttributes = [ 'title', 'description' ];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [ 'type', 'title', 'description' ];


	public function listings() {
		return $this->belongsToMany( Listing::class )->withTimestamps();
	}
}
