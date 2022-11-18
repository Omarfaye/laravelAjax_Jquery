<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{LoginController,
    RegisterController,
    LogoutController,
    StudentController,
    UserController,
    TacheController};

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


Route::get('/', [UserController::class, 'index']);

Route::get('login', [LoginController::class, 'index'])->name('login');
Route::post('login', [LoginController::class, 'login'])->name('post.login');

Route::get('register', [RegisterController::class, 'index'])->name('register');
Route::post('register', [RegisterController::class, 'register'])->name('post.register');

Route::resource('users',UserController::class)->except('index');

Route::resource('taches',TacheController::class)->except('index');

//Partie Ajax Jquery
Route::get('students', [StudentController::class, 'index']);
Route::post('students', [StudentController::class, 'store']);
Route::get('fetch-students', [StudentController::class, 'fetchstudent']);
Route::get('edit-student/{id}', [StudentController::class, 'edit']);
Route::put('update_student/{id}', [StudentController::class, 'update']);
Route::delete('delete-student/{id}', [StudentController::class, 'destroy']);


Route::get('logout', [LogoutController::class, 'logout'])->name('logout');
