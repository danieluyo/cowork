<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Lab
 *
 * @property integer $id
 * @property integer $teacher_id
 * @property integer $booking_id
 * @property integer $price
 * @property boolean $status
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\LabTranslation[] $translations
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Lab translatedIn( $locale = null )
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Lab translated()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Lab listsTranslations( $translationField )
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Lab withTranslation()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Lab whereTranslation( $key, $value, $locale = null )
 * @property string $photo
 * @property integer $students_count
 * @property-read \App\Models\User $teacher
 * @property-read \App\Models\Booking $booking
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Lab whereTranslationLike($key, $value, $locale = null)
 */
class Lab extends Model {

	use Translatable;

	/**
	 * The attributes that are translatable.
	 *
	 * @var array
	 */
	public $translatedAttributes = [ 'title', 'description' ];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [ 'teacher_id', 'booking_id', 'price', 'status', 'title', 'description' ];


	public function teacher() {
		return $this->belongsTo( User::class, 'teacher_id' );
	}

	public function booking() {
		return $this->belongsTo( Booking::class );
	}
}
