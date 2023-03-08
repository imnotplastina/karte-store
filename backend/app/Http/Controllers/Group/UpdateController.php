<?php

namespace App\Http\Controllers\Group;

use App\Http\Controllers\Controller;
use App\Http\Requests\Group\UpdateRequest;
use App\Models\Group;
use Illuminate\Contracts\View\View;

class UpdateController extends Controller
{
    public function __invoke(UpdateRequest $request, Group $group): View
    {
        $data = $request->validated();
        $group->update($data);

        return view('group.show', compact('group'));
    }
}
