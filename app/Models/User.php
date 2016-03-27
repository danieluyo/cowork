<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;


/**
 * App\Models\User
 *
 * @property integer $id
 * @property string $first_name
 * @property string $last_name
 * @property string $about_me
 * @property integer $birth_year
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $remember_token
 * @property string $role
 * @property string $city
 * @property string $country
 * @property string $address
 * @property string $zip
 * @property double $latitude
 * @property double $longitude
 * @property string $phone
 * @property string $website
 * @property string $photo
 * @property string $facebook
 * @property string $settings
 * @property string $payment
 * @property integer $followers
 * @property integer $followings
 * @property integer $status
 * @property \Carbon\Carbon $accessed_at
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class User extends Authenticatable
{

    const STATUS_ACTIVE = 1;
    const ROLE_SUPER = 'SUPER';
    const ROLE_ADMIN = 'ADMIN';
    const ROLE_TUTOR = 'TUTOR';
    const ROLE_USER = 'USER';

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'settings' => 'array',
        'payment'  => 'array',
//		'status'   => 'boolean',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['accessed_at'];
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'about_me',
        'birth_year',
        'username',
        'email',
        'password',
        'role',
        'city',
        'country',
        'address',
        'zip',
        'latitude',
        'longitude',
        'phone',
        'website',
        'photo',
        'facebook',
        'settings',
        'payment',
        'followers',
        'followings',
        'status',
        'accessed_at',
    ];


    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * Get the user's role all capitalized.
     *
     * @param  string $value
     *
     * @return string
     */
    public function getRoleAttribute($value)
    {
        return strtoupper($value);
    }

    /**
     * Get the user's first name capitalized.
     *
     * @param  string $value
     *
     * @return string
     */
    public function getFirstNameAttribute($value)
    {
        return ucfirst($value);
    }

    /**
     * Get the user's last name capitalized.
     *
     * @param  string $value
     *
     * @return string
     */
    public function getLastNameAttribute($value)
    {
        return ucfirst($value);
    }


    /*
     * Relations
     * */

    public function venues()
    {
        return $this->belongsToMany(Venue::class, 'admin_venues', 'admin_id');
    }

    /**
     *  Wrapper around the property photo
     * @return string
     */
    public function avatar()
    {
        return $this->photo;
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }

    public function labs()
    {
        return $this->hasMany(Lab::class, 'teacher_id');
    }

    public function following()
    {
        return $this->belongsToMany(User::class, 'user_followings', 'following_id', 'follower_id')->withTimestamps();
    }

}
