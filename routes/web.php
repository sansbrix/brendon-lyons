<?php

use App\Http\Controllers\ReasonCodeController;
use App\Http\Controllers\ZipCodeController;
use App\Models\ZipCode;
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

Route::get('/', function() {
    return view('welcome');
})->name('page1');

Route::get('/page-2', function() {
    return view('page2');
})->name('page2');

Route::group(['prefix' => 'admin'], function() {
    Route::post('zip-codes',[ZipCodeController::class, 'store'])->name('zip-code.store');
    Route::resource('zip-codes', ZipCodeController::class);
    Route::resource('reason-codes', ReasonCodeController::class);

    Route::post('import-zip-codes',[ZipCodeController::class, 'importZipCode'])->name('zip-code.import');
});

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/get-zip-codes', [App\Http\Controllers\AjaxController::class, 'getZipCodes'])->name('get-zip-codes');
Route::get('/get-zip-codes-all', [App\Http\Controllers\AjaxController::class, 'getZipCodesAll'])->name('get-zip-codes-all');
