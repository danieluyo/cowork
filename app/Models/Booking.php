<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Booking
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $space_id
 * @property string $review
 * @property boolean $is_lab
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\User $user
 * @property-read \App\Models\Space $space
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Lab[] $labs
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Booking whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Booking whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Booking whereSpaceId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Booking whereReview($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Booking whereIsLab($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Booking whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Booking whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Booking extends Model {


	/**
	 * The relations to eager load on every query.
	 *
	 * @var array
	 */
	protected $with = [ 'user','space' ];
	/**
	 * The attributes that should be casted to native types.
	 *
	 * @var array
	 */
	protected $casts = [
		'is_lab' => 'boolean',
	];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [ 'user_id', 'space_id', 'review', 'is_lab' ];


	public function user() {
		return $this->belongsTo( User::class );
	}

	public function space() {
		return $this->belongsTo( Space::class );
	}

	public function labs() {
		return $this->hasMany( Lab::class );
	}
}
