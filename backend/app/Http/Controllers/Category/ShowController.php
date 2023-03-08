<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Contracts\View\View;

class ShowController extends Controller
{
    public function __invoke(Category $category): View
    {
        return view('category.show', compact('category'));
    }
}
