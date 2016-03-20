<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\UserFollowing
 *
 * @property integer $id
 * @property integer $follower_id
 * @property integer $following_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserFollowing whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserFollowing whereFollowerId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserFollowing whereFollowingId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserFollowing whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\UserFollowing whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class UserFollowing extends Model {

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [ 'follower_id', 'following_id' ];

//	public function follower(){
//	    return $this->belongsTo(User::class,'follower_id');
//	}
//
//	public function following(){
//	    return $this->belongs(User::class,'following_id');
//	}
}
