<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Category\CategoryResource;
use App\Models\Product;
use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JsonSerializable;

/**
 * @property mixed $id
 * @property mixed $title
 * @property mixed $description
 * @property mixed $content
 * @property mixed $price
 * @property mixed $count
 * @property mixed $imageUrl
 * @property mixed $is_published
 * @property mixed $category
 * @property mixed $colors
 * @property mixed $productImages
 * @property mixed $group_id
 */
class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array|Arrayable|JsonSerializable
     */
    public function toArray(Request $request): array|JsonSerializable|Arrayable
    {
        $products = Product::where('group_id', $this->group_id)->get();

        return [
            'id' => $this->id,
            'title' => $this->title,
            'description' => $this->description,
            'content' => $this->content,
            'price' => $this->price,
            'count' => $this->count,
            'image_url' => $this->imageUrl,
            'is_published' => $this->is_published,
            'category' => new CategoryResource($this->category),
            'group_products' => ProductMinResource::collection($products),
            'product_images' => ProductImageResource::collection($this->productImages),
        ];
    }
}
