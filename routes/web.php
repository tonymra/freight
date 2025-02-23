<?php

use App\Http\Controllers\NotificationController;
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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/send-notification', [\App\Http\Controllers\NotificationController::class, 'sendNotification'])->name('sendNotification');
Route::get('/test-event', [\App\Http\Controllers\NotificationController::class, 'testEvent'])->name('testEvent');
