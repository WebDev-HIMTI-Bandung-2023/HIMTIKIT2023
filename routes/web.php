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
Route::post('/Logout', [LoginController::class, 'Logout']);
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);

Route::get('/software', [UserController::class, 'software']);
Route::post('/changeMajor', [UserController::class, 'changeMajor']);
Route::get('/download/{Course}', [UserController::class, 'DownloadMaterial']);

Route::post('/adminAuth', [AdminController::class, 'authenticateadmin']);
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/ChangeBinusian', [AdminController::class, 'Logout']);
Route::get('/admin/{Course}/{Type}', [AdminController::class, 'addeditadmin']);
Route::post('/admin/{Course}/{Type}', [AdminController::class, 'UploadData']);

Route::get('/adminsoftware', [AdminController::class, 'AdminSoftware']);
Route::get('/adminsoftware/{Software}/{Type}', [AdminController::class, 'AddEditSoftware']);
Route::post('/adminsoftware/{Software}/{Type}', [AdminController::class, 'UploadSoftware']);

Route::get('/addeditsoftware', function () {
    return view('addeditsoftware');
});

/* Example view only without controller */
Route::get('/example', function () {
    return view('contoh');
});
