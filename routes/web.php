<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NewsContentController;
use App\Http\Controllers\MainController;

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

Route::get('/', [MainController::class, 'index']);
Route::get('/news-detail/{id}', [MainController::class, 'newsDetail'])->name('news-detail');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => ['auth', 'isAdmin'], 'prefix' => 'admin'], function (){
    Route::resource('news-contents', NewsContentController::class);
});
