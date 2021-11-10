<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WorkEntryController;
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
Route::get('/user/{id}', [UserController::class, 'show'])->where('id', '[0-9]+')->name('getUser');
Route::post('/user', [UserController::class, 'store'])->name('createUser');
Route::put('/user', [UserController::class, 'update'])->name('updateUser');
Route::delete('/user', [UserController::class, 'destroy'])->name('deleteUser');

Route::get('/workentries', [WorkEntryController::class, 'index'])->name('workentries');
Route::post('/workentry', [WorkEntryController::class, 'store'])->name('createWorkEntry');
Route::put('/workentry', [WorkEntryController::class, 'update'])->name('updateWorkEntry');
Route::delete('/workentry', [WorkEntryController::class, 'destroy'])->name('deleteWorkEntry');
Route::get('/workentry/{id}', [WorkEntryController::class, 'show'])->where('id', '[0-9]+')->name('getWorkEntry');
Route::get('/workentries/{userId}', [WorkEntryController::class, 'getByUserId'])->where('id', '[0-9]+')->name('getByUserId');


Route::get('/validator/errors', function (Request $request){
    return response()->json(['error' => true, 'messages' => $request->session()->get('errors')->getBag('default')->getMessages()]);
})->name('getValidatorErrors');