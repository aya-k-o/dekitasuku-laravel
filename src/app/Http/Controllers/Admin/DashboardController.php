<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Child;

class DashboardController extends Controller
{
    public function index(){
    $children = Child::where('user_id', auth()->id())->get();
    return view('admin.dashboard',['children' => $children]);
    }
}
