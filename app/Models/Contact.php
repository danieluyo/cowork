<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Contact
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property string $content
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ContactUs whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ContactUs whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ContactUs whereEmail($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ContactUs whereContent($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ContactUs whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\ContactUs whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ContactUs extends Model {
	protected $table = "contact_us";
}
