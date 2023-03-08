<?php

namespace App\Models;

use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Application;
use Illuminate\Support\Carbon;

/**
 * App\Models\ProductImages
 *
 * @property int $id
 * @property string $file_path
 * @property int $product_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read mixed $image_url
 * @method static Builder|ProductImages newModelQuery()
 * @method static Builder|ProductImages newQuery()
 * @method static Builder|ProductImages query()
 * @method static Builder|ProductImages whereCreatedAt($value)
 * @method static Builder|ProductImages whereFilePath($value)
 * @method static Builder|ProductImages whereId($value)
 * @method static Builder|ProductImages whereProductId($value)
 * @method static Builder|ProductImages whereUpdatedAt($value)
 * @method static where(string $string, $id)
 * @method static create(array $array)
 * @method static updateOrCreate(array $array)
 */
class ProductImages extends Model
{
    protected $table = 'product_images';
    protected $guarded = false;

    public function getImageUrlAttribute(): Application|string|UrlGenerator|\Illuminate\Contracts\Foundation\Application
    {
        return url('storage/' . $this->file_path);
    }
}
