<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Child;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $children = Child::where('user_id', auth()->id())->get();
        return view('admin.tasks',['children' => $children]);
        
    }

    public function store(Request $request)
    {
       //権限チェック
       $child  = Child::where('id', $request->child_id)
                        ->where('user_id', auth()->id())
                        ->firstOrFail();

        //タスク作成
        Task::create([
            'child_id' => $child->id,
            'title' => $request->title,
            'points' => $request->points,
        ]);

        return redirect()->route('admin.tasks')
                         ->with('success','タスクを追加しました');
    }

    public function destroy(Task $task)
    {
        //権限チェック
        $child = Child::where('id', $task->child_id)
                    ->where('user_id', auth()->id())
                    ->firstOrFail();

        $task->delete();
    
        return redirect()->route('admin.tasks')
                         ->with('success', 'タスクを削除しました');
    }


}
