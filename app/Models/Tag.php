<?php

namespace App\Models;

use Dimsav\Translatable\Translatable;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Tag
 *
 * @property integer $id
 * @property string $type
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\TagTranslation[] $translations
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tag translatedIn($locale = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tag translated()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tag listsTranslations($translationField)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tag withTranslation()
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tag whereTranslation($key, $value, $locale = null)
 * @property integer $user_id
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Space[] $spaces
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tag whereTranslationLike($key, $value, $locale = null)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tag whereId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tag whereType($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tag whereUserId($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tag whereCreatedAt($value)
 * @method static \Illuminate\Database\Query\Builder|\App\Models\Tag whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Tag extends Model
{
    use Translatable;

    /**
     * The attributes that are translatable.
     *
     * @var array
     */
    public $translatedAttributes = ['title', 'description'];

    /**
     * The relations to eager load on every query.
     *
     * @var array
     */
    protected $with = ['translations'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['type', 'title', 'description'];


    public function spaces()
    {
        return $this->belongsToMany(Space::class, 'space_tags')->withTimestamps();
    }
}
