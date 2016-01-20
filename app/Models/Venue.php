<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model {


	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = [
		'name',
		'category_id',
		'image_id',
		'city',
		'country',
		'address',
		'zip',
		'latitude',
		'longitude',
		'tax_rate',
		'tax_rate',
		'currency_id',
		'number',
		'email',
		'website',
	];

	public function admins() {
		return $this->belongsToMany( User::class, 'admin_venues', 'admin_id', 'id' )->withTimestamps();
	}

	public function spaces() {
		return $this->hasMany( Space::class );
	}

	public function logo() {
		return $this->media()->first()->filename;
	}

	public function media() {
		return $this->belongsTo( Media::class, 'image_id' );
	}

	public function category() {
		return $this->belongsTo( Category::class );
	}

	public function currency() {
		return $this->belongsTo( Currency::class );
	}
}
