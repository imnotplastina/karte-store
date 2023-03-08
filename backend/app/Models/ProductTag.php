<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\ProductTag
 *
 * @property int $id
 * @property int|null $tag_id
 * @property int|null $product_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|ProductTag newModelQuery()
 * @method static Builder|ProductTag newQuery()
 * @method static Builder|ProductTag query()
 * @method static Builder|ProductTag whereCreatedAt($value)
 * @method static Builder|ProductTag whereId($value)
 * @method static Builder|ProductTag whereProductId($value)
 * @method static Builder|ProductTag whereTagId($value)
 * @method static Builder|ProductTag whereUpdatedAt($value)
 */
class ProductTag extends Model
{
    protected $table = 'product_tags';
    protected $guarded = false;
}
