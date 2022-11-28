<?php
/**
 * @Author: Your name
 * @Date:   2022-11-28 07:11:19
 * @Last Modified by:   Your name
 * @Last Modified time: 2022-11-28 07:15:23
 */


use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::resource('users', \App\Http\Controllers\UserController::class)
    ->middleware('auth');
Route::resource('products', \App\Http\Controllers\ProductController::class)
    ->middleware('auth');
Route::resource('transactions', \App\Http\Controllers\TransactionController::class)
    ->middleware('auth');
Route::get('reportStock', [ReportController::class, 'downloadPDF']);
Route::get('send-mail', [MailController::class, 'index']);
Route::resource('laporan', \App\Http\Controllers\LaporanController::class)
    ->middleware('auth');
Route::post('/laporan/proses', [\App\Http\Controllers\LaporanController::class, 'proses']);