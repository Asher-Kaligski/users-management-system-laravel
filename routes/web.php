<?php

use Illuminate\Support\Facades\Route;

// use App\Http\Controllers\CustomersController;
// use App\Http\Controllers\TicketResponsesController;
// use App\Http\Controllers\TicketController;

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


Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::resource('customers', 'App\Http\Controllers\CustomersController')->middleware('employee');
Route::get('customers/{search}/search', 'App\Http\Controllers\CustomersController@search')->middleware('employee');
Route::resource('tickets', 'App\Http\Controllers\TicketsController')->middleware('employee');
Route::get('/tickets/customer/{id}/create', 'App\Http\Controllers\TicketsController@create')->middleware('employee');
Route::resource('ticket-comments', 'App\Http\Controllers\TicketCommentsController')->middleware('employee');