<?php

use App\Http\Controllers\BotManController;
use App\Models\Image;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ImageController;

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

Route::get('/', function () {
    $images = Image::latest()->get();
    return view('index',compact('images'));
});
Route::resource('Images', ImageController::class);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
// BotMan
// Route::get('/botman',[BotManController::class,'handle']);
// Route::post('/botman',[BotManController::class,'handle']);
Route::match(['get','post'],'/botman',[BotManController::class,'handle']);