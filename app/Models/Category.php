<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Category
 *
 * @property integer $id
 * @property integer $parent_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\CategoryTranslation[] $translations
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category translatedIn( $locale = null )
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category translated()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category listsTranslations( $translationField )
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category withTranslation()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Category whereTranslation( $key, $value, $locale = null )
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Space[] $spaces
 */
class Category extends Model {

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
	protected $fillable = [ 'parent_id', 'title', 'description' ];


	public function spaces() {
		return $this->belongsToMany( Space::class );
	}

}
