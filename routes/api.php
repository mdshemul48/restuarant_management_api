<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\RolePermission\PermissionController;
use App\Http\Controllers\RolePermission\RoleController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\StuffController;
use App\Http\Controllers\TransactionController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});



Route::controller(RoleController::class)->group(function () {
    Route::post('/create_role', 'createRole');
    Route::get('/get_roles','getRoles');
});

Route::controller(PermissionController::class)->group(function () {
    Route::post('/create_permission', 'createPermission');
    Route::get('/get_permissions','getPermissions');
});


/*order*/
Route::controller(OrderController::class)->group(function(){
    Route::post('/order/create_order','createOrder');
    Route::put('/order/update_order/{id}','updateOrder');
    Route::get('/our_order','retrieveOrder');
    Route::get('orders/{order_type}','retrieveOrderByType');
    Route::delete('/order/deleteOrder/{id}','deleteOrder');
});
/*expenses controller*/
Route::controller(ExpenseController::class)->group(function(){
    Route::get('/our_expenses','retrieveExpenses');
});
/*transaction*/
Route::controller(TransactionController::class)->group(function(){
    Route::get('/our_transaction','retrieveTransactions');
    Route::get('/our_transaction_by_date', 'retrieveTransactionsByDateRange');
});

/*stock controller*/
Route::controller(StockController::class)->group(function() {
    Route::get('/our_stocks', 'retrieveStocks');
    Route::get('/our_stocks_by_date', 'retrieveStocksByDateRange');
});

// Define routes for the StuffController
Route::controller(StuffController::class)->group(function() {
    Route::get('/our_stuff', 'retrieveStuff');
});


// Define routes for the CategoryController
Route::controller(CategoryController::class)->group(function() {
    Route::get('/categories', 'retrieveCategories');
    Route::get('/categories/{id}', 'retrieveCategoryById');
});
