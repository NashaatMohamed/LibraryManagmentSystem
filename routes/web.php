<?php
use App\Http\Controllers\BookController;
use App\Http\Controllers\BookCategoryController;
use App\Http\Controllers\searchController;

use App\Http\Controllers\CartController;
use App\Http\Controllers\ProfileController;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\DetilsController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->middleware('auth');

Auth::routes();

Route::get('/home', [BookController::class, 'index'])->name('home');

Route::get('/search', [searchController::class, 'search'])->name('search')->middleware('auth');
Route::post('/search', [searchController::class, 'getSearch'])->name('getSearch')->middleware('auth');

Route::get('edit/{id}',[DetilsController::class,'edit'])->name('show.index');

Route::get('category/{id}', [BookController::class, 'showcat'])->middleware('auth');


Route::put('books/{id}',[DetilsController::class, 'update'])->name('rating');

Route::post('home/stores',[BookController::class,'store'])->name('books.store');
Route::get('/home/show', [BookController::class, 'show'])->name('home_show');



Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
Route::resource('comment','App\Http\Controllers\CommentController')->middleware('auth');


////// cart
Route::get('cart', [CartController::class, 'cartList'])->name('cart.list')->middleware('auth');
Route::post('cart', [CartController::class, 'addToCart'])->name('cart.store')->middleware('auth');
Route::post('update-cart', [CartController::class, 'updateCart'])->name('cart.update')->middleware('auth');
Route::post('remove', [CartController::class, 'removeCart'])->name('cart.remove')->middleware('auth');
Route::post('clear', [CartController::class, 'clearAllCart'])->name('cart.clear')->middleware('auth');

// update profile
Route::get('myprofile',[ProfileController::class,'index'])->name('getprofile')->middleware('auth');
Route::get('getprofile/{id}',[ProfileController::class,'edit'])->name('updateprofile')->middleware('auth');
Route::put('updateprof/{id}',[ProfileController::class,'update'])->name('updatee')->middleware('auth');

Route::get('category/{id}', [BookController::class, 'showcat'])->middleware('auth');

Route::get('test',[ProfileController::class,'test']);


Route::resource('favorites','App\Http\Controllers\favoriteController');

