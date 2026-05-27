<?php

namespace App\Http\Controllers\Child;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Child;

class SelectController extends Controller
{
    public function index()
    {
        $children = Child::where('user_id', auth()->id())->get();
        return view('children.select', compact('children'));
    }

    public function store(Request $request)
    {
        $child = Child::where('id', $request->child_id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        session(['selected_child_id' => $child->id]);

        return redirect()->route('child.today');
    }
}
