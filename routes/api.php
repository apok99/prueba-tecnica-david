<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/users', [UserController::class, 'index'])->name('users');
Route::get('/user/{id}', [UserController::class, 'getUser'])->where('id', '[0-9]+')->name('getUser');

Route::post('/user', [UserController::class, 'store'])->name('createUser');
Route::put('/user', [UserController::class, 'update'])->name('updateUser');
Route::delete('/user', [UserController::class, 'delete'])->name('deleteUser');

Route::get('/validator/errors', function (Request $request){
    return response()->json(['error' => true, 'messages' => $request->session()->get('errors')->getBag('default')->getMessages()]);
})->name('getValidatorErrors');