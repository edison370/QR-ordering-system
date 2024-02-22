<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//public view
Route::get('/', [MenuController::class, 'homeCategory'])->name('client.home');

Route::get('/Category/{name}', [MenuController::class, 'getCategoryItems'])->name('client.itemResult');

//authentication view
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/userReport',function () {
        return view('page.userReport');
    })->name('userReport');

    Route::get('/userReportResult', [UserController::class, 'getAll'])->name('userReportResult');
});

require __DIR__.'/auth.php';
