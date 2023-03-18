<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;
use App\Services\ProductService;
use Illuminate\Contracts\View\View;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Product $product, ProductService $service): View
    {
        $validated = $request->validated();

        $updatedProduct = $service->updateProduct($product, $validated);
        $service->uploadImages($updatedProduct, $validated);

        return view('product.show', compact('product'));
    }
}
