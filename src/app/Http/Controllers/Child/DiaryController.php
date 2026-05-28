<?php

namespace App\Http\Controllers\Child;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Diary;

class DiaryController extends Controller
{
    public function index(){
        $childId = session('selected_child_id');
        $diaries = Diary::where('child_id', $childId)->get();
        return view('child.diaries', ['diaries' => $diaries]);
    }
}
