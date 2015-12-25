<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User;

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
 */
class Message extends Model {
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
