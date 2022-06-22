<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactUsController;
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


// Route::get('/contactUs', 'ContactUsController@index');
// Route::post('/submitContact', 'ContactUsController@store');

Route::get('/contactUs', [ContactUsController::class, 'index']);
Route::post('/submitContact', [ContactUsController::class, 'store']);
