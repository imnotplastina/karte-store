<?php

namespace App\Http\Resources\Product;

use App\Http\Resources\Category\CategoryResource;
use App\Models\Product;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
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
