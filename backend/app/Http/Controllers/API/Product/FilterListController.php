<?php

namespace App\Http\Controllers\API\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Product;
use App\Models\Tag;
use Illuminate\Http\JsonResponse;

class FilterListController extends Controller
{
    public function __invoke(Product $product): JsonResponse
    {
        $categories = Category::all();
        $colors = Color::all();
        $tags = Tag::all();

        $maxPrice = Product::orderBy('price', 'DESC')
            ->first()
            ->price;
        $minPrice = Product::orderBy('price', 'ASC')
            ->first()
            ->price;

        $result = [
            'categories' => $categories,
            'colors' => $colors,
            'tags' => $tags,
            'price' => [
                'max' => $maxPrice,
                'min' => $minPrice
            ]
        ];

        return response()->json($result);
    }
}
