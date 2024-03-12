<?php

use App\Http\Controllers\GithubUserController;
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

Route::get('/', function () {
    return view('user.index');
});

Route::post('/search',[GithubUserController::class,'search'])->name('search');
Route::get('/followers/{username}', [GitHubUserController::class, 'getMoreFollowers']);
