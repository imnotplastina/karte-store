<?php

namespace App\Services;

use App\Models\Product;
use App\Models\ProductImages;
use Illuminate\Support\Facades\Storage;

class ProductService
{
    /**
     * @param array $validated
     * @return Product
     */
    public function createProduct(array $validated): Product
    {
        $tagsIds      = $validated['tags'];
        $colorsIds    = $validated['colors'];

        unset($validated['tags'], $validated['colors'], $validated['product_images']);

        $validated['preview_image'] = Storage::disk('public')->put('/images', $validated['preview_image']);

        $product = Product::firstOrCreate([
            'title' => $validated['title']
        ], $validated);

        $product->colors()->sync($colorsIds);
        $product->tags()->sync($tagsIds);

        return $product;
    }

    /**
     * @param Product $product
     * @param array $validated
     * @return Product
     */
    public function updateProduct(Product $product, array $validated): Product
    {
        $tagsIds      = $validated['tags'];
        $colorsIds    = $validated['colors'];

        unset($validated['tags'], $validated['colors'], $validated['product_images']);

        $validated['preview_image'] = Storage::disk('public')->put('/images', $validated['preview_image']);

        $product->update($validated);

        $product->colors()->sync($colorsIds);
        $product->tags()->sync($tagsIds);

        return $product;
    }

    /**
     * @param Product $product
     * @param array $validated
     * @return void
     */
    public function uploadImages(Product $product, array $validated): void
    {
        $productImages = $validated['product_images'];

        foreach ($productImages as $productImage) {
            $countCurrentImages = ProductImages::where('product_id', $product->id)->count();

            if ($countCurrentImages > 3) continue;

            $filePath = Storage::disk('public')->put('/images', $productImage);
            ProductImages::create([
                'product_id' => $product->id,
                'file_path'  => $filePath,
            ]);
        }
    }
}
