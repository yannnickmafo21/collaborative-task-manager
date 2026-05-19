<?php

use App\Http\Controllers\CommentsController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ViewController;
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

Route::get("aa", function() {
    return view("profil");
})->name('test');

Route::get('inscription', function () {
    return view('inscription');
})->name('inscription');

Route::get('login', function() {
    return view('login');
})->name('login');

Route::post("create_account", [UserController::class, "create_account"]);
Route::post("connexion", [UserController::class, "connexion"]);

Route::middleware(('auth'))->group((function () {
    //route vers dashboard
    Route::get('dashboard', [UserController::class, "show_dashboard"])->name("dashboard");
    
    //route vers la création d'une tâche
    Route::post('/create_task', [TaskController::class, "create"]);
    
    //sauvegarde du commentaire
    Route::post("post_comment", [CommentsController::class, "store"]);

    //récupérer les commentaires d'une tâche
    Route::get("get_comments/{task_id}", [CommentsController::class, "getComments"]);

    //changer de vue
    Route::get("change_view/{view_name}", [ViewController::class, "change_view"]);
}));