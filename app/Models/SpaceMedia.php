<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\SpaceMedia
 *
 * @property integer $id
 * @property integer $space_id
 * @property integer $media_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SpaceMedia whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SpaceMedia whereSpaceId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SpaceMedia whereMediaId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SpaceMedia whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\SpaceMedia whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class SpaceMedia extends Model {

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [ 'media_id', 'space_id'];
}
