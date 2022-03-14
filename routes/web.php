<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\Admin\UserController;


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
});

Route::get('/upload', [UploadController::class, 'index'])->name('upload');
Route::post('/upload', [UploadController::class, 'upload'])->name('upload_files');
Route::get('/upload/download/{filename}', [UploadController::class, 'download'])->name('download');
Route::get('/upload/show/{filename}', [UploadController::class, 'show'])->name('upload.show');
Route::get('/upload/delete/{filename}', [UploadController::class, 'delete'])->name('delete');
