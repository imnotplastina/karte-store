<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\ColorProduct
 *
 * @property int $id
 * @property int|null $color_id
 * @property int|null $product_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|ColorProduct newModelQuery()
 * @method static Builder|ColorProduct newQuery()
 * @method static Builder|ColorProduct query()
 * @method static Builder|ColorProduct whereColorId($value)
 * @method static Builder|ColorProduct whereCreatedAt($value)
 * @method static Builder|ColorProduct whereId($value)
 * @method static Builder|ColorProduct whereProductId($value)
 * @method static Builder|ColorProduct whereUpdatedAt($value)
 */
class ColorProduct extends Model
{
    protected $table = 'color_products';
    protected $guarded = false;
}
