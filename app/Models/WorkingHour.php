<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\WorkingHour
 *
 * @property integer $id
 * @property integer $space_id
 * @property boolean $day
 * @property string $openings
 * @property string $closing
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property integer $venue_id
 * @property string $closings
 */
class WorkingHour extends Model {
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [ 'space_id', 'day','openings','closings'];
}
