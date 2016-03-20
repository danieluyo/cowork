<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CategoryTranslation
 *
 * @property integer $id
 * @property integer $category_id
 * @property string $locale
 * @property string $title
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CategoryTranslation whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CategoryTranslation whereCategoryId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CategoryTranslation whereLocale($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CategoryTranslation whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CategoryTranslation whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CategoryTranslation whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\CategoryTranslation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CategoryTranslation extends Model {
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [ 'title', 'description' ];
}
