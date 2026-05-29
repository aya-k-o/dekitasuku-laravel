<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Child\SelectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Child\TodayController;
use App\Http\Controllers\Child\TaskCompletionController;
use App\Http\Controllers\Child\DiaryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Admin\ChildController;

Route::middleware('auth')->group(function () {

    //ルート
    Route::get('/', function () {
        return redirect()->route('children.select');
    });

    //子ども選択
    Route::get('/children/select',[SelectController::class, 'index'])
        ->name('children.select');
    Route::post('/children/select', [SelectController::class, 'store'])
        ->name('children.select.store');
    
    //子ども画面
    Route::get('/child/today', [TodayController::class, 'index'])
        ->name('child.today');
    
    //タスク完了
    Route::post('/child/tasks/complete',[TaskCompletionController::class,'store'])->name('child.tasks.complete');
    
    //日記
    Route::get('/child/diaries', [DiaryController::class, 'index'])
         ->name('child.diaries');
    Route::post('/child/diaries', [TodayController::class, 'store'])
         ->name('child.diaries.store');

    //管理画面
    Route::get('/admin/dashboard',[DashboardController::class, 'index'])
        ->name('admin.dashboard');
    Route::get('/admin/tasks',[TaskController::class, 'index'])->name('admin.tasks');
    Route::post('/admin/tasks', [TaskController::class, 'store'])->name('admin.tasks.store');
    Route::delete('/admin/tasks/{task}', [TaskController::class, 'destroy'])->name('admin.tasks.destroy');
    //子ども管理
    Route::get('/admin/children', [ChildController::class, 'index'])->name('admin.children');
Route::post('/admin/children', [ChildController::class, 'store'])->name('admin.children.store');
Route::delete('/admin/children/{child}', [ChildController::class, 'destroy'])->name('admin.children.destroy');
//プロフィール(Breeze標準)

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
