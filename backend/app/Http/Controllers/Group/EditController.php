<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Models\Group;
use Illuminate\Contracts\View\View;

class EditController extends Controller
{
    public function __invoke(Group $group): View
    {
        return view('group.edit', compact('group'));
    }
}
