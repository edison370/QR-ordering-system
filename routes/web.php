<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
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

Route::get('/OrderHistory', [OrderController::class, 'getClientOrder'])->name('client.orderHistory');

//authentication view
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    //Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    //User Report
    Route::get('/userReport',function () {
        return view('page.userReport');
    })->name('userReport');
    Route::get('/userReportResult', [UserController::class, 'getAll'])->name('userReportResult');
    Route::get('/user/{id}', [UserController::class, 'getUser']);
    Route::put('/editUser/{id}', [UserController::class, 'updateUser'])->name('adminUpdateUser');

    
});

require __DIR__.'/auth.php';
