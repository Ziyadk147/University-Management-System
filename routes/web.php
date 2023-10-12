<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::controller(\App\Http\Controllers\RoleController::class)->group(function(){
    Route::get('/role/index' , 'index')->name('role.index');
    Route::get('/role/create', 'create')->name('role.create');
    Route::post('/role/store', 'store')->name('role.store');
    Route::get('/role/{id}/edit', 'edit')->name('role.edit');
    Route::post('/role/{id}/', 'update')->name('role.update');
    Route::get('/role/{id}/', 'destroy')->name('role.delete');
});
Route::controller(\App\Http\Controllers\PermissionController::class)->group(function(){
    Route::get('/permission/index' , 'index')->name('permission.index');
    Route::get('/permission/create', 'create')->name('permission.create');
    Route::post('/permission/store', 'store')->name('permission.store');
    Route::get('/permission/{id}/edit', 'edit')->name('permission.edit');
    Route::post('/permission/{id}/', 'update')->name('permission.update');
    Route::get('/permission/{id}/', 'destroy')->name('permission.delete');
});

Route::get('/logout' , [\App\Http\Controllers\Auth\LoginController::class,'logout'])->name('logout');