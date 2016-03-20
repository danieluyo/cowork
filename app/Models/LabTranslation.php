<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\LabTranslation
 *
 * @property integer $id
 * @property integer $lab_id
 * @property string $locale
 * @property string $title
 * @property string $description
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\LabTranslation whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\LabTranslation whereLabId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\LabTranslation whereLocale($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\LabTranslation whereTitle($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\LabTranslation whereDescription($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\LabTranslation whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\LabTranslation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class LabTranslation extends Model {
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [ 'title', 'description' ];
}
