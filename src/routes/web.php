<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Child\SelectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Child\TodayController;
use App\Http\Controllers\Child\TaskCompletionController;

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


//プロフィール(Breeze標準)

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
