<?php

namespace App\Http\Controllers\Child;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Child;
use App\Models\Task;
use App\Models\TaskCompletion;
use App\Models\Diary;

class TodayController extends Controller
{
    public function index()
    {
        $childId = session('selected_child_id');
        $child = Child::findOrFail($childId);

        $tasks = Task::where('child_id', $childId)->get();

        $completedTaskIds = TaskCompletion::where('child_id', $childId)
            ->whereDate('completed_at', today())
            ->pluck('task_id');

        $diary = Diary::where('child_id', $childId)
            ->whereDate('diary_date', today())
            ->first();

        return view('child.today', compact('child', 'tasks', 'completedTaskIds', 'diary'));
    }

    public function store(Request $request)
    {
     $childId = session('selected_child_id');
         
     Diary::create([
        'child_id' => $childId,
        'diary_date' => today(),
        'body' => $request->body,
     ]);

    return redirect()->route('child.today');
     }

}
