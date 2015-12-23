<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\WorkingHour
 *
 * @property integer $id
 * @property integer $listing_id
 * @property boolean $day
 * @property string $openings
 * @property string $closing
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class WorkingHour extends Model {
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [ 'listing_id', 'day','openings','closings'];
}
