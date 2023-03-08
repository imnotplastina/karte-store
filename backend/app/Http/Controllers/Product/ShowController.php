<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Contracts\View\View;

class ShowController extends Controller
{
    public function __invoke(Product $product): View
    {
        return view('product.show', compact('product'));
    }
}
