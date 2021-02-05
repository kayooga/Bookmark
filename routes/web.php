<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookmarksController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::group(['middleware' => 'auth'], function () {

    
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');
    
Route::get('/', [BookmarksController::class, 'index'])
->name('bookmarks.index');

Route::get('/bookmarks/{id}', [BookmarksController::class, 'show'])
->where('id', '[0-9]+')
    ->name('bookmarks.show');
    
Route::get('/bookmarks/create', [BookmarksController::class, 'create'])
->name('bookmarks.create');

Route::post('/bookmarks/store', [BookmarksController::class, 'store'])
->name('bookmarks.store');

Route::get('/bookmarks/edit/{id}', [BookmarksController::class, 'edit'])
    ->where('id','[0-9]+')
    ->name('bookmarks.edit');

Route::post('/bookmarks/update', [BookmarksController::class, 'update'])
->name('bookmarks.update');

Route::post('/bookmarks/destroy/{id}', [BookmarksController::class, 'destroy'])
->name('bookmarks.destroy');

});
//レコードの表示、作成、更新、削除機能をまとめて設定する
// Route::resource('/bookmarks',BookmarksController::class);

require __DIR__.'/auth.php';