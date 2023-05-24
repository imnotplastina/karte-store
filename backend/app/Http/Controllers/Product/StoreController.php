<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Services\ProductService;
use Illuminate\Http\RedirectResponse;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request, ProductService $productService): RedirectResponse
    {
        $validated = $request->validated();

        $createdProduct = $productService->createProduct($validated);
        $productService->uploadProductImages($createdProduct, $validated['product_images']);

        return redirect()->route('product.index');
    }
}
