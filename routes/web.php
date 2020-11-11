<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controller\NoteController;

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

Route::resource('/tags', 'App\Http\Controllers\TagController');

Route::post('/notes', [\App\Http\Controllers\NoteController::class, 'store']);

Route::get('/notes/create', 'App\Http\Controllers\NoteController@create');

Route::get('/', 'App\Http\Controllers\NoteController@index');


