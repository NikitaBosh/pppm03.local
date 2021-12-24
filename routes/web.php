<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UploadController;
// use App\Http\Controllers\Task\TaskController;
use App\Http\Controllers\Admin\UserController;

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
Route::redirect('/', '/login');


Auth::routes();
Route::get(
    '/home',
    [HomeController::class, 'index']
)->name('home');

//>
$groupData = [
    'prefix' => 'admin',
    'as' => 'admin.',
    'middleware' => 'auth',
];

Route::group($groupData, function () {
    Route::resource('users', UserController::class);
});
//<

//>

// $groupData = [
//     'prefix' => 'admin',
//     'as' => 'admin.',
//     'middleware' => 'auth',
// ];

// Route::group($groupData, function () {
//     Route::resource('users', TaskController::class);
// });
// //<

Route::get('/upload', [UploadController::class, 'index'])->name('upload');
Route::post('/upload', [UploadController::class, 'upload'])->name('upload_files');
Route::get('/upload/download/{filename}', [UploadController::class, 'download'])->name('download');
Route::get('/upload/show/{filename}', [UploadController::class, 'show'])->name('upload.show');
Route::get('/upload/delete/{filename}', [UploadController::class, 'delete'])->name('delete');
