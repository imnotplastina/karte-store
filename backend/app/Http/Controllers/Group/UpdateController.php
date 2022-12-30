<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Http\Requests\Group\UpdateRequest;
use App\Models\Group;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Group $group)
    {
        $data = $request->validated();
        $group->update($data);

        return view('group.show', compact('group'));
    }
}
