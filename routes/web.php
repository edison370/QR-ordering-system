<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\TableController;
use App\Http\Controllers\CategoryController;
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
Route::get('/home', [MenuController::class, 'homeCategory'])->name('client.home');

Route::get('/Category/{name}', [MenuController::class, 'getCategoryItems'])->name('client.itemResult');
Route::get('/OrderHistory', [OrderController::class, 'getClientOrder'])->name('client.orderHistory');
Route::post('/addToCart', [ItemController::class, 'addToCart'])->name('client.addToCart');

Route::get('/CartView',function () {
    return view('modules.client.cartView');
})->name('client.cartView');

Route::get('/getCartItem', [ItemController::class, 'getCartItems'])->name('getCartItem');
Route::post('/changeCartQuantity', [ItemController::class, 'changeCartQuantity'])->name('changeCartQuantity');

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
    Route::get('/userList',function () {
        return view('page.userList');
    })->name('userList');
    Route::get('/userListResult', [UserController::class, 'getAll'])->name('userListResult');
    Route::get('/editUser/{id}', [UserController::class, 'getUser']);
    Route::put('/user/{id}', [UserController::class, 'updateUser'])->name('adminUpdateUser');

    //Item List
    Route::get('/itemList',function () {
        return view('page.itemList');
    })->name('itemList');
    Route::get('/addItem',function () {
        return view('modals.addItemModal');
    })->name('addItem');
    Route::get('/itemListResult', [ItemController::class, 'getAll'])->name('itemListResult');
    Route::get('/editItem/{id}', [ItemController::class, 'getItem']);
    Route::put('/item/{id}', [ItemController::class, 'updateItem'])->name('updateItem');
    Route::post('/item', [ItemController::class, 'createItem'])->name('createItem');

    //Order List
    Route::get('/orderList',function () {
        return view('page.orderList');
    })->name('orderList');
    Route::get('/addOrder',function () {
        return view('modals.addOrderModal');
    })->name('addOrder');
    Route::get('/orderListResult', [OrderController::class, 'getAll'])->name('orderListResult');
    Route::get('/editOrder/{id}', [OrderController::class, 'getOrder']);
    Route::put('/order/{id}', [OrderController::class, 'updateOrder'])->name('updateOrder');
    Route::post('/order', [OrderController::class, 'createOrder'])->name('createOrder');

    //Category
    Route::get('/getAllCategory', [CategoryController::class, 'getAllCategory'])->name('getAllCategory');

    //Table
    Route::get('/tableList',function () {
        return view('page.tableList');
    })->name('tableList');
    Route::get('/addTable',function () {
        return view('modals.addTableModal');
    })->name('addTable');
    Route::get('/tableListResult', [TableController::class, 'getAll'])->name('tableListResult');
    Route::get('/editTable/{id}', [TableController::class, 'getTable']);
    Route::put('/table/{id}', [TableController::class, 'updateTable'])->name('updateTable');
    Route::post('/table', [TableController::class, 'createTable'])->name('createTable');

});

require __DIR__.'/auth.php';
