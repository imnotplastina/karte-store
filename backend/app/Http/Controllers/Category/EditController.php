<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Contracts\View\View;

class EditController extends Controller
{
    public function __invoke(Category $category): View
    {
        return view('category.edit', compact('category'));
    }
}
