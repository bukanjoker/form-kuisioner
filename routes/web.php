<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UsersController;
use App\Http\Controllers\QuestionaireController;

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
    return view('pages.greetings');
});
Route::get('/registration', function() {
    return view('pages.form-user');
});
Route::get('/quisionaire', function() {
    return view('pages.quisioner');
});
Route::get('/form-data', function() {
    return view('pages.form-data');
});

Route::post('/user-register', [ UsersController::class, 'register' ]);
Route::post('/add-word', [ QuestionaireController::class, 'addWords' ]);