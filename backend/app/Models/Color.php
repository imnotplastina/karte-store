<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\Color
 *
 * @property int $id
 * @property string $title
 * @property string|null $color
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Color newModelQuery()
 * @method static Builder|Color newQuery()
 * @method static Builder|Color query()
 * @method static Builder|Color whereColor($value)
 * @method static Builder|Color whereCreatedAt($value)
 * @method static Builder|Color whereId($value)
 * @method static Builder|Color whereTitle($value)
 * @method static Builder|Color whereUpdatedAt($value)
 * @method static firstOrCreate(mixed $data)
 */
class Color extends Model
{
    protected $table = 'colors';
    protected $guarded = false;
}
