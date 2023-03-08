<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;

class DeleteController extends Controller
{
    public function __invoke(Product $product): RedirectResponse
    {
        $product->delete();

        return redirect()->route('product.index');
    }
}
