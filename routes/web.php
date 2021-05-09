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
Route::get('/thanks', function () {
    return view('pages.thanks');
});
Route::get('/admin-menu', function () {
    return view('pages.admin-menu');
});
Route::get('/data-table', [ QuestionaireController::class, 'getDataTable' ]);

Route::get('/quisionaire', [ QuestionaireController::class, 'getQuestionaries' ]);
Route::post('/quisionaire/insert', [ QuestionaireController::class, 'insertQuestionaries' ])->name('insertQuesioner');
Route::post('/quisionaire/{id}/update', [ QuestionaireController::class, 'updateQuestionaries' ])->name('updateQuesioner');

Route::get('/form-data', [ QuestionaireController::class, 'getFormData' ]);
Route::post('/add-word', [ QuestionaireController::class, 'addWords' ]);
Route::post('/words/{id}/delete', [ QuestionaireController::class, 'deleteWord' ]);

Route::get('/user-list', [ UsersController::class, 'getUsers' ]);
Route::post('/user-register', [ UsersController::class, 'register' ]);
Route::post('/user/{id}/delete', [ UsersController::class, 'deleteUser' ]);
