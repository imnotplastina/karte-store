<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Contracts\View\View;

class ShowController extends Controller
{
    public function __invoke(Group $group): View
    {
        return view('group.show', compact('group'));
    }
}
