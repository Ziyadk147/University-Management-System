<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use \App\Http\Controllers\RoleController;
use \App\Http\Controllers\PermissionController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/logout' , [\App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');

Route::controller(PermissionController::class)->prefix('/permission')->group(function(){
    Route::get('/bind' , 'bindPermissionPage')->name('permission.bind');
    Route::post('/bindPermission' , 'bindPermissionToRole')->name('permission.bindPermission');
    Route::post('/getRolePermission' , 'getRolePermissions')->name('permission.getRolePermission');
});
Route::controller(RoleController::class)->prefix('/role')->group(function(){
   Route::get('/bind','bindUserPage')->name('role.bind');
});


Route::resource('/role',\App\Http\Controllers\RoleController::class);
Route::resource('/permission',\App\Http\Controllers\PermissionController::class);
Route::resource('/user' , \App\Http\Controllers\UserController::class);