<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BackendController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\CategoryController;
use App\Models\Category;
use App\Models\User;

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

Route::get('/', function () {
    return view('welcome');
});


//category
Route::get('logout',[BackendController::class,'logout'])->name('logout');
Route::get('categories',[CategoryController::class,'index'])->name('category');
Route::post('categories/store',[CategoryController::class,'store'])->name('category.store');
Route::get('categories/edit/{id}',[CategoryController::class,'edit'])->name('category.edit');
Route::post('categories/update/{id}',[CategoryController::class,'update'])->name('category.update');
Route::get('categories/delete/{id}',[CategoryController::class,'destroy'])->name('category.delete');
Route::get('categories/trashed',[CategoryController::class,'trashedcategory'])->name('trashed');
Route::get('categories/restore/{id}',[CategoryController::class,'restore'])->name('category.restore');
Route::get('categories/forceDelete/{id}',[CategoryController::class,'harddelete'])->name('category.forceDelete');


//Brands
Route::get('Brands',[BrandController::class,'index'])->name('Brands');
Route::post('Brands/store',[BrandController::class,'store'])->name('Brands.store');
Route::get('Brands/edit/{id}',[BrandController::class,'edit'])->name('Brands.edit');
Route::post('Brands/update/{id}',[BrandController::class,'update'])->name('Brands.update');
Route::get('Brands/delete/{id}',[BrandController::class,'destroy'])->name('Brands.delete');



Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/dashboard', function () {
        return view('admin.index');
 })->name('dashboard');

    Route::get('/users', function () {
        $users=User::all();
        return view('admin.users',compact('users'));
})->name('users');

});
