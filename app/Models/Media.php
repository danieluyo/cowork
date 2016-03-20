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
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Media whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Media whereOriginalName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Media whereFilename($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Media whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Media whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Media extends Model {

	public function spaces() {
		return $this->belongsToMany( Space::class )->withTimestamps();
	}
}
