<?php

namespace App\Http\Controllers\Child;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TaskCompletion;

class TaskCompletionController extends Controller
{
    public function store(Request $request)
    {
        $childId = session('selected_child_id');

        TaskCompletion::create([
            'child_id' => $childId,
            'task_id' => $request->task_id,
            'completed_at' => now(),
        ]);

        return redirect()->route('child.today');
    }

}
