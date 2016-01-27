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
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Space[] $spaces
 */
class Media extends Model {

	public function spaces() {
		return $this->belongsToMany( Space::class )->withTimestamps();
	}
}
