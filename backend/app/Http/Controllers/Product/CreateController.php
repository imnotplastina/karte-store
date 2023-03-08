<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\Tag;
use Illuminate\Contracts\View\View;

class CreateController extends Controller
{
    public function __invoke(): View
    {
        $tags = Tag::all();
        $colors = Color::all();
        $categories = Category::all();

        return view('product.create', compact('tags', 'colors', 'categories'));
    }
}
