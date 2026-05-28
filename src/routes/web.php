<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Child\SelectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Child\TodayController;
use App\Http\Controllers\Child\TaskCompletionController;
use App\Http\Controllers\Child\DiaryController;
use App\Http\Controllers\Admin\DashboardController;

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

//プロフィール(Breeze標準)

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
