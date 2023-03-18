<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Services\ProductService;
use Illuminate\Http\RedirectResponse;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request, ProductService $service): RedirectResponse
    {
        $validated = $request->validated();

        $createdProduct = $service->createProduct($validated);
        $service->uploadImages($createdProduct, $validated);

        return redirect()->route('product.index');
    }
}
