<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Currency
 *
 * @property integer $id
 * @property string $name
 * @property string $code
 * @property string $symbol
 * @property float $rate
 * @property boolean $is_after_symbol
 * @property string $decimal_separator
 * @property string $thousands_separator
 * @property boolean $used
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Currency extends Model {
	//
}
