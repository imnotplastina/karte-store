<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\ColorProduct;
use App\Models\Product;
use App\Models\ProductImages;
use App\Models\ProductTag;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Product $product)
    {
        $data = $request->validated();

        $productImages = $data['product_images'];
        $tagsIds = $data['tags'];
        $colorsIds = $data['colors'];
        unset($data['tags'], $data['colors'], $data['product_images']);

        $data['preview_image'] = Storage::disk('public')->put('/images', $data['preview_image']);

        $product->update($data);

        foreach ($productImages as $productImage) {
            $countCurrentImage = ProductImages::where('product_id', $product->id)->count();

            if ($countCurrentImage > 3) continue;

            $filePath = Storage::disk('public')->put('/images', $productImage);
            ProductImages::updateOrCreate([
                'product_id' => $product->id,
                'file_path' => $filePath,
            ]);
        }

        $product->colors()->sync($colorsIds);
        $product->tags()->sync($tagsIds);

        return view('product.show', compact('product'));
    }
}
