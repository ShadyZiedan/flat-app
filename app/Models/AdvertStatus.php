<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\AdvertStatus
 *
 * @property int $id
 * @property int $platform_id
 * @property int $advert_id
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 *
 * @property Platform $platform
 *
 * @method static \Illuminate\Database\Eloquent\Builder|AdvertStatus newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdvertStatus newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|AdvertStatus query()
 * @method static \Illuminate\Database\Eloquent\Builder|AdvertStatus whereAdvertId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdvertStatus whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdvertStatus whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdvertStatus wherePlatformId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdvertStatus whereSuccess($value)
 * @method static \Illuminate\Database\Eloquent\Builder|AdvertStatus whereUpdatedAt($value)
 * @mixin \Eloquent
 * @method static \Illuminate\Database\Eloquent\Builder|AdvertStatus whereStatus($value)
 */
class AdvertStatus extends Model
{
    use HasFactory;

    protected $fillable = ['advert_id', 'platform_id'];

    public function platform(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Platform::class);
    }
}
