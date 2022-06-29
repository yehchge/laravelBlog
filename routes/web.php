<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\DictController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BlogController;

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

Route::resource('dicts', DictController::class);
Route::resource('tasks', TaskController::class);
Route::resource('articles', ArticleController::class);

Route::prefix('blogs')->group(function () {
// Route::group(['prefix'=>'/blogs'], function(){
    Route::get('/', [BlogController::class, 'index'])->name('blogs.index');
    Route::get('help', [BlogController::class, 'help'])->name('blogs.help');
    Route::get('login', [BlogController::class, 'login'])->name('blogs.login');
    Route::post('run', [BlogController::class, 'run'])->name('blogs.run');
    Route::get('dashboard', [BlogController::class, 'dashboard'])->name('blogs.dashboard');
    Route::post('xhrInsert', [BlogController::class, 'xhrInsert'])->name('blogs.xhrInsert');
    Route::get('logout', [BlogController::class, 'logout'])->name('blogs.logout');
    Route::get('xhrGetListings', [BlogController::class, 'xhrGetListings'])->name('blogs.xhrGetListings');
    Route::post('xhrDeleteListing', [BlogController::class, 'xhrDeleteListing'])->name('blogs.xhrDeleteListing');
    Route::get('note', [BlogController::class, 'note'])->name('blogs.note');
    Route::post('create', [BlogController::class, 'create'])->name('blogs.create');
    Route::get('edit/{id}', [BlogController::class, 'edit'])->name('blogs.edit');
    Route::get('delete/{id}', [BlogController::class, 'delete'])->name('blogs.delete');
    Route::post('editSave/{id}', [BlogController::class, 'editSave'])->name('blogs.editSave');
    Route::get('user', [BlogController::class, 'user'])->name('blogs.user');
    Route::post('user_add', [BlogController::class, 'user_add'])->name('blogs.user_add');
    Route::get('user_del/{id}', [BlogController::class, 'user_del'])->name('blogs.user_del');
    Route::get('user_edit/{id}', [BlogController::class, 'user_edit'])->name('blogs.user_edit');
    Route::post('user_edit/{id}', [BlogController::class, 'user_edit'])->name('blogs.user_edit');

    // Route::get('/', 'BlogController@index')->name('blogs.index');
    // Route::get('help', 'BlogController@help')->name('blogs.help');
    // Route::get('login', 'BlogController@login')->name('blogs.login');
    // Route::post('run', 'BlogController@run')->name('blogs.run');
    // Route::get('dashboard', 'BlogController@dashboard')->name('blogs.dashboard');
    // Route::post('xhrInsert', 'BlogController@xhrInsert')->name('blogs.xhrInsert');
    // Route::get('logout', 'BlogController@logout')->name('blogs.logout');
    // Route::get('xhrGetListings', 'BlogController@xhrGetListings')->name('blogs.xhrGetListings');
    // Route::post('xhrDeleteListing', 'BlogController@xhrDeleteListing')->name('blogs.xhrDeleteListing');
    // Route::get('note', 'BlogController@note')->name('blogs.note');
    // Route::post('create', 'BlogController@create')->name('blogs.create');
    // Route::get('edit/{id}', 'BlogController@edit')->name('blogs.edit');
    // Route::get('delete/{id}', 'BlogController@delete')->name('blogs.delete');
    // Route::post('editSave/{id}', 'BlogController@editSave')->name('blogs.editSave');
    // Route::get('user', 'BlogController@user')->name('blogs.user');
    // Route::post('user_add', 'BlogController@user_add')->name('blogs.user_add');
    // Route::get('user_del/{id}', 'BlogController@user_del')->name('blogs.user_del');
    // Route::get('user_edit/{id}', 'BlogController@user_edit')->name('blogs.user_edit');
    // Route::post('user_edit/{id}', 'BlogController@user_edit')->name('blogs.user_edit');
});