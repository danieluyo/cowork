<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Message
 *
 * @property integer $id
 * @property integer $from_id
 * @property integer $to_id
 * @property boolean $type
 * @property string $content
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \App\Models\User $sender
 * @property-read \App\Models\User $receiver
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Message whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Message whereFromId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Message whereToId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Message whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Message whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Message whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Message whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Message extends Model {

	/**
	 * The relations to eager load on every query.
	 *
	 * @var array
	 */
	protected $with = [ 'sender','receiver' ];
	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [ 'from_id', 'to_id', 'type', 'content' ];


	public function sender() {
		return $this->belongsTo( User::class, 'from_id' );
	}

	public function receiver() {
		return $this->belongsTo( User::class, 'to_id' );
	}
}
