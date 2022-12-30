<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Models\Group;

class EditController extends Controller
{
    public function __invoke(Group $group)
    {
        return view('group.edit', compact('group'));
    }
}
