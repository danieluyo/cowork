<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Media
 *
 * @property integer $id
 * @property string $original_name
 * @property string $filename
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Media extends Model {

	public function listings() {
		return $this->belongsToMany( Listing::class )->withTimestamps();
	}
}
