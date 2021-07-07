<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\InterfaceController;

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


Route::get('/', [InterfaceController::class,'in']);
Route::get('/out', [InterfaceController::class,'out']);
Route::post('/', [InterfaceController::class,'inAction']);
Route::get('/search', [InterfaceController::class,'search']);
Route::get('/list', [InterfaceController::class,'list']);
