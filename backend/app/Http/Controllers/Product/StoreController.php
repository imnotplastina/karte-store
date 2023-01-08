<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Models\ColorProduct;
use App\Models\Product;
use App\Models\ProductImages;
use App\Models\ProductTag;
use Illuminate\Support\Facades\Storage;


class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);

        $productImages = $data['product_images'];
        $tagsIds = $data['tags'];
        $colorsIds = $data['colors'];
        unset($data['tags'], $data['colors'], $data['product_images']);

        $product = Product::firstOrCreate([
            'title' => $data['title']
        ], $data);

        foreach ($productImages as $productImage) {
            $countCurrentImages = ProductImages::where('product_id', $product->id)->count();

            if ($countCurrentImages > 3) continue;

            $filePath = Storage::disk('public')->put('/images', $productImage);
            ProductImages::create([
                'product_id' => $product->id,
                'file_path' => $filePath,
            ]);
        }

        $product->colors()->sync($colorsIds);
        $product->tags()->sync($tagsIds);

        return redirect()->route('product.index');
    }
}
