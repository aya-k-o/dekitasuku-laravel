<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Child;

class ChildController extends Controller
{
    public function index()
    {
        $children = Child::where('user_id', auth()->id())->get();
        return view('admin.children',['children' => $children]);
    }

    public function store(Request $request)
    {
        $child = new Child();
        $child->user_id = auth()->id();
        $child->name = $request->name;
        $child->save();

        return redirect()->route('admin.children')
                         ->with('success', '子どもを追加しました');
    }


    public function destroy(Child $child)
{
    Child::where('id', $child->id)
         ->where('user_id', auth()->id())
         ->firstOrFail()
         ->delete();

    return redirect()->route('admin.children')
                     ->with('success', '子どもを削除しました');
}

}
