<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BelajarController;


//default laravel
Route::get('/', function () {
    return view('welcome');
});

//membuat rute baru / membuat jalan baru/ jalur baru
//rute baru
Route::get('belajar', function () {
    return '<h1>Hello world</h1>';
});

//rute baru menampilkan hello world di controller
Route::get('master', [App\Http\Controllers\BelajarController::class, 'index']);
Route::get('belajar2', [BelajarController::class, 'view']);

Route::get('books',[App\Http\Controllers\BookController::class,'index'])->name('books.index'); //kasih nama di setiap route yang kita buat
// a href = '{{url('/books')}}' ->tanpa name
// a href = '{{route('book.index')}}' -> menggunakan name
// form action = {{url('/store')}} -> tanpa nama
// form action = {{route('book.store')}} -> dengan nama
Route::get('create-book', [App\Http\Controllers\BookController::class,'create'])->name('book.create');
Route::post('storebook', [App\Http\Controllers\BookController::class, 'store'])->name('book.store');
Route::delete('destroybook/{id}',[App\Http\Controllers\BookController::class,'destroy'])->name('book.destroy');
Route::get('edit/{id}',[App\Http\Controllers\BookController::class,'edit'])->name('book.edit');
Route::put('update/{id}', [App\Http\Controllers\BookController::class,'update'])->name('book.update');

//rute category
Route::get('category', [App\Http\Controllers\CategoryController::class, 'index'])->name('category.index');
Route::get('create-category', [App\Http\Controllers\CategoryController::class, 'create'])->name('category.create');
Route::post('store-category',[App\Http\Controllers\CategoryController::class, 'store'])->name('category.store');
//delete
Route::delete('destroy-category/{id}',[App\Http\Controllers\CategoryController::class,'destroy'])->name('category.destroy');
Route::get('edit-category/{id}',[App\Http\Controllers\CategoryController::class,'edit'])->name('category.edit');
Route::put('update-category/{id}', [App\Http\Controllers\CategoryController::class,'update'])->name('category.update');

//rute product
Route::get('product', [App\Http\Controllers\ProductController::class, 'index'])->name('product.index');
Route::get('create-product', [App\Http\Controllers\ProductController::class, 'create'])->name('product.create');
Route::post('store-product', [App\Http\Controllers\ProductController::class, 'store'])->name('product.store');
//delete
Route::delete('destroy-product/{id}',[App\Http\Controllers\ProductController::class,'destroy'])->name('product.destroy');
Route::get('edit-product/{id}',[App\Http\Controllers\ProductController::class,'edit'])->name('product.edit');
Route::put('update-product/{id}', [App\Http\Controllers\ProductController::class,'update'])->name('product.update');

//sales routing
Route::get('sales', [App\Http\Controllers\SalesController::class, 'index'])->name('sales.index');

//route sales item
Route::post('sales/items', [App\Http\Controllers\SalesItemController::class, 'store'])->name('sales.items.store');
Route::put('sales/items/{id}', [App\Http\Controllers\SalesItemController::class, 'update'])->name('sales.items.update');
Route::delete('sales/items/{id}', [App\Http\Controllers\SalesItemController::class, 'destroy'])->name('sales.items.destroy');

//route purchase order

// route purchase order
Route::get('Purchase-Order', [App\Http\Controllers\PurchaseOrderController::class, 'index'])->name('Purchase-order.index');
Route::get('Purchase-Order/create', [App\Http\Controllers\PurchaseOrderController::class, 'create'])->name('Purchase-order.create');
Route::post('Purchase-order/store', [App\Http\Controllers\PurchaseOrderController::class, 'store'])->name('Purchase-order.store');
Route::delete('Purchase-order/destroy/{id}', [App\Http\Controllers\PurchaseOrderController::class, 'destroy'])->name('Purchase-order.destroy');
Route::get('Purchase-order/edit/{id}', [App\Http\Controllers\PurchaseOrderController::class, 'edit'])->name('Purchase-order.edit');
Route::put('Purchase-order/update/{id}', [App\Http\Controllers\PurchaseOrderController::class, 'update'])->name('Purchase-order.update');
Route::get('Purchase-order/{id}', [App\Http\Controllers\PurchaseOrderController::class, 'show'])->name('Purchase-order.show');

//route sales order
Route::get('Sales-Order', [App\Http\Controllers\SalesOrderController::class, 'index'])->name('Sales-order.index');
Route::get('Sales-Order/create', [App\Http\Controllers\SalesOrderController::class, 'create'])->name('Sales-order.create');
Route::post('Sales-Order/store', [App\Http\Controllers\SalesOrderController::class, 'store'])->name('Sales-order.store');
Route::delete('Sales-Order/destroy/{id}', [App\Http\Controllers\SalesOrderController::class, 'destroy'])->name('Sales-order.destroy');
Route::get('Sales-Order/edit/{id}', [App\Http\Controllers\SalesOrderController::class, 'edit'])->name('Sales-order.edit');
Route::put('Sales-Order/update/{id}', [App\Http\Controllers\SalesOrderController::class, 'update'])->name('Sales-order.update');
Route::get('Sales-Order/{id}', [App\Http\Controllers\SalesOrderController::class, 'show'])->name('Sales-order.show');
