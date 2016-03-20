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
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Currency whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Currency whereName($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Currency whereCode($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Currency whereSymbol($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Currency whereRate($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Currency whereIsAfterSymbol($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Currency whereDecimalSeparator($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Currency whereThousandsSeparator($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Currency whereUsed($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Currency whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Currency whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Currency extends Model {
	//
}
