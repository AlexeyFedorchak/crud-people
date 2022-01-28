<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\AuthController;

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
    return redirect()->route('people.index');
});

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
Route::post('/register', [AuthController::class, 'registerPost'])->name('register.post');

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::middleware('auth')->group(function() {
    Route::get('/people', [PeopleController::class, 'index'])->name('people.index');
    Route::get('/people/show/{people}', [PeopleController::class, 'show'])->name('people.show');
    Route::post('/people/update/{people}', [PeopleController::class, 'update'])->name('people.update');
    Route::post('/people/create', [PeopleController::class, 'create'])->name('people.create');
    Route::get('/people/create', [PeopleController::class, 'showCreatePage'])->name('people.create.show');
    Route::get('/people/delete/{people}', [PeopleController::class, 'delete'])->name('people.delete');
});

