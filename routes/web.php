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
Route::get('/software', [UserController::class, 'software']);
Route::post('/changeMajor', [UserController::class, 'changeMajor']);
Route::post('/Logout', [LoginController::class, 'Logout']);
Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'authenticate']);
Route::get('/download/{Course}', [LoginController::class, 'authenticate']);

Route::post('/admin', [AdminController::class, 'authenticateadmin']);
Route::get('/admin', [AdminController::class, 'index']);
Route::get('/ChangeBinusian', [AdminController::class, 'Logout']);
Route::get('/admin/{Course}/{Type}', [AdminController::class, 'addeditadmin']);
Route::post('/admin/{Course}/{Type}', [AdminController::class, 'UploadData']);

<<<<<<< HEAD
Route::get('/adminsoftware', function(){
    return view('adminsoftware');
});
Route::get('/addeditsoftware', function(){
    return view('addeditsoftware');
});

=======
>>>>>>> df9014ac247e1fb90717d7cb5870a17478169eb7
/* Example view only without controller */
Route::get('/example', function () {
    return view('contoh');
});