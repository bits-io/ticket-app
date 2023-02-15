<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BandController;
use App\Http\Controllers\BandPlayingController;
use App\Http\Controllers\ConcertController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\VerifyTransactionController;
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

route::get('registration',[AuthController::class,'registration'])->name('registration');
route::post('registration',[AuthController::class,'registrationAction'])->name('registration.post');
route::get('login',[AuthController::class,'login'])->name('login');
route::post('login',[AuthController::class,'loginAction'])->name('login.post');
route::get('logout',[AuthController::class,'logout'])->name('logout');

Route::group(['prefix' => 'admin','middleware' => ['check-role:1']], function() {

    route::get('dashboard',[AuthController::class,'dashboard'])->name('dashboard');

    route::get('concert',[ConcertController::class,'index'])->name('admin.concert');
    route::get('concert/{id}',[ConcertController::class,'show'])->name('admin.concert.detail');
    route::post('concert',[ConcertController::class,'store'])->name('admin.concert.create');
    route::post('concert/{id}',[ConcertController::class,'update'])->name('admin.concert.update');
    route::delete('concert/{id}',[ConcertController::class,'destroy'])->name('admin.concert.delete');

    route::get('customer',[CustomerController::class,'index'])->name('admin.customer');
    route::get('customer/{id}',[CustomerController::class,'show'])->name('admin.customer.detail');
    route::post('customer',[CustomerController::class,'store'])->name('admin.customer.create');
    route::post('customer/{id}',[CustomerController::class,'update'])->name('admin.customer.update');
    route::delete('customer/{id}',[CustomerController::class,'destroy'])->name('admin.customer.delete');


    route::get('band-playing',[BandPlayingController::class,'index'])->name('admin.band-playing');
    route::get('band-playing/{id}',[BandPlayingController::class,'show'])->name('admin.band-playing.detail');
    route::post('band-playing',[BandPlayingController::class,'store'])->name('admin.band-playing.create');
    route::post('band-playing/{id}',[BandPlayingController::class,'update'])->name('admin.band-playing.update');
    route::delete('band-playing/{id}',[BandPlayingController::class,'destroy'])->name('admin.band-playing.delete');


    route::get('band',[BandController::class,'index'])->name('admin.band');
    route::get('band/{id}',[BandController::class,'show'])->name('admin.band.detail');
    route::post('band',[BandController::class,'store'])->name('admin.band.create');
    route::post('band/{id}',[BandController::class,'update'])->name('admin.band.update');
    route::delete('band/{id}',[BandController::class,'destroy'])->name('admin.band.delete');


    route::get('transaction',[TransactionController::class,'index'])->name('admin.transaction');
    route::get('transaction/{id}',[TransactionController::class,'show'])->name('admin.transaction.detail');
    route::post('transaction',[TransactionController::class,'store'])->name('admin.transaction.create');
    route::post('transaction/{id}',[TransactionController::class,'update'])->name('admin.transaction.update');


    route::get('verify-transaction',[VerifyTransactionController::class,'index'])->name('admin.verify-transaction');
    route::get('verify-transaction/{id}',[VerifyTransactionController::class,'show'])->name('admin.verify-transaction.detail');
    route::post('verify-transaction',[VerifyTransactionController::class,'store'])->name('admin.verify-transaction.create');
    route::post('verify-transaction/{id}',[VerifyTransactionController::class,'update'])->name('admin.verify-transaction.update');


    route::get('ticket',[TicketController::class,'index'])->name('admin.ticket');
    route::get('ticket/{id}',[TicketController::class,'show'])->name('admin.ticket.detail');
    route::post('ticket',[TicketController::class,'store'])->name('admin.ticket.create');
    route::post('ticket/{id}',[TicketController::class,'update'])->name('admin.ticket.update');



});

Route::group(['middleware' => ['check-role:2']], function() {

    route::get('home',[AuthController::class,'home'])->name('home');
    route::get('order/{id}',[TransactionController::class,'showOrder'])->name('order.show');
    route::post('order/{id}',[TransactionController::class,'storeOrder'])->name('order.store');

    route::get('invoice/{id}',[TransactionController::class,'invoice'])->name('invoice');
    route::post('invoice/{id}',[VerifyTransactionController::class,'store'])->name('verify.payment');

    route::get('check',[TicketController::class,'index'])->name('check-in');
    route::post('check',[TicketController::class,'index'])->name('check');

});
