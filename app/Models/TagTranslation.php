<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\TagTranslation
 *
 * @property integer $id
 * @property integer $tag_id
 * @property string $locale
 * @property string $title
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\TagTranslation whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\TagTranslation whereTagId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\TagTranslation whereLocale($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\TagTranslation whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\TagTranslation whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\TagTranslation whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\TagTranslation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class TagTranslation extends Model {
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [ 'title', 'description' ];
}
