<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AdminVenue
 *
 * @property integer $id
 * @property integer $admin_id
 * @property integer $venue_id
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @method static \Illuminate\Database\Query\Builder|\App\Models\AdminVenue whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\AdminVenue whereAdminId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\AdminVenue whereVenueId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\AdminVenue whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\AdminVenue whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class AdminVenue extends Model
{
    //
}
