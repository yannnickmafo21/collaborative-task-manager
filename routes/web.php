<?php

use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
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

Route::get('inscription', function () {
    return view('inscription');
})->name('inscription');
Route::get('login', function() {
    return view('login');
})->name('login');

Route::post("create_account", [UserController::class, "create_account"]);
Route::post("connexion", [UserController::class, "connexion"]);

Route::get('dashboard', function() {
    return view('index');
})->middleware('auth')->name('dashboard');

Route::middleware(('auth'))->group((function () {
    //route vers dashboard
    Route::get('dashboard', function() {
    return view('index');})->name('dashboard');

    //route vers la création d'une tâche
    Route::post('/create_task', [TaskController::class, "create"]);
}));