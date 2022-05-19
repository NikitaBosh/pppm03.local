<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FileController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\CategoryController;


Route::redirect('/', '/login');


Auth::routes();
Route::get(
    '/home',
    [HomeController::class, 'index']
)->name('home');

$groupData = [
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => 'auth',
];

Route::group($groupData, function () {
    Route::resource('users', UserController::class)->middleware('can:admin');
    Route::resource('categories', CategoryController::class)->middleware('can:admin');
});


Route::resource('files', FileController::class);
Route::get('/files/download/{file}', [FileController::class, 'download'])->name('files.download');


