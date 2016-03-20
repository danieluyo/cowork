<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SpaceTranslation
 *
 * @property integer $id
 * @property integer $space_id
 * @property string $locale
 * @property string $title
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property string $equipments
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SpaceTranslation whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SpaceTranslation whereSpaceId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SpaceTranslation whereLocale($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SpaceTranslation whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SpaceTranslation whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SpaceTranslation whereEquipments($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SpaceTranslation whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SpaceTranslation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SpaceTranslation extends Model {
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [ 'title', 'description','equipments' ];
}
