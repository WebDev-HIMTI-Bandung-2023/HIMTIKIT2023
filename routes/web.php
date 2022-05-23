<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\UserController;

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
Route::get('/software', function () {
    return view('software');
});
Route::post('/Logout', [LoginController::class, 'Logout']);
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
// Route::post('/UploadData', [AdminController::class, 'UploadData']);
Route::post('/admin', [AdminController::class, 'authenticateadmin']);
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/ChangeBinusian', [AdminController::class, 'Logout']);
Route::get('/admin/{Course}/{Type}', [AdminController::class, 'addeditadmin']);
Route::post('/admin/{Course}/{Type}', [AdminController::class, 'UploadData']);