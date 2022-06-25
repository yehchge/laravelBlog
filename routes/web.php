<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\PostsController;
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
});

// old route
// Route::get('/contactUs', 'ContactUsController@index');
// Route::post('/submitContact', 'ContactUsController@store');

// Route::get('/home', 'HomeController@index');

// Auth::routes();

// Route::group(['middleware' => 'auth'], function () {

//     Route::resource('posts', 'PostsController');
// });




// New Route
Route::middleware(['auth'])->group(function () {
	Route::resource('posts', PostsController::class);

});

Route::get('/contactUs', [ContactUsController::class, 'index']);
Route::post('/submitContact', [ContactUsController::class, 'store']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
