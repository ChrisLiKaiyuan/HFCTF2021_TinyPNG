<?php

use Illuminate\Support\Facades\Route;

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

use App\Http\Controllers\IndexController;
use App\Http\Controllers\ImageController;

Route::get('/', function () {
    return view('upload');
});
Route::post('/', [IndexController::class, 'fileUpload'])->name('file.upload.post');

//Don't expose the /image to others!
Route::get('/image', [ImageController::class, 'handle'])->name('image.handle');
