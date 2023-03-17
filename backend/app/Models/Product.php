<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Contracts\Routing\UrlGenerator;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Application;
use Illuminate\Support\Carbon;
use Illuminate\Testing\Fluent\Concerns\Has;

/**
 * App\Models\Product
 *
 * @property int $id
 * @property string $title
 * @property string $description
 * @property string $content
 * @property int $price
 * @property int $count
 * @property string $preview_image
 * @property int $is_published
 * @property int|null $category_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property int|null $group_id
 * @property-read Category|null $category
 * @property-read Collection<int, Color> $colors
 * @property-read int|null $colors_count
 * @property-read mixed $image_url
 * @property-read Collection<int, ProductImages> $productImages
 * @property-read int|null $product_images_count
 * @property-read Collection<int, Tag> $tags
 * @property-read int|null $tags_count
 * @method static \Illuminate\Database\Eloquent\Builder|Product filter(\App\Http\Filters\FilterInterface $filter)
 * @method static \Illuminate\Database\Eloquent\Builder|Product newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Product onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Product query()
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereContent($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCount($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereGroupId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereIsPublished($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePreviewImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Product withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|Product withoutTrashed()
 * @method static orderBy(string $string, string $string1)
 * @method static firstOrCreate(array $array, mixed $data)
 * @method static where(string $string, mixed $group_id)
 * @method static factory(int $int)
 */
class Product extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Filterable;

    protected $table = 'products';
    protected $guarded = false;

    public function getImageUrlAttribute(): Application|string|UrlGenerator|\Illuminate\Contracts\Foundation\Application
    {
        return url('storage/' . $this->preview_image);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function colors(): BelongsToMany
    {
        return $this->belongsToMany(Color::class, 'color_products', 'product_id', 'color_id');
    }

    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'product_tags', 'product_id', 'tag_id');
    }

    public function productImages(): HasMany
    {
        return $this->hasMany(ProductImages::class, 'product_id', 'id');
    }
}
