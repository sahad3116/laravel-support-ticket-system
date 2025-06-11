<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TicketController;


Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/ticket', [TicketController::class, 'Tickets'])->name('tickets');
Route::post('/ticketstore', [TicketController::class, 'store'])->name('tickets.store');
    Route::get('/login', [TicketController::class, 'Login'])->name('login');
    Route::get('/register', [TicketController::class, 'registerpage'])->name('register');
    Route::post('/loginuser', [UserController::class, 'login'])->name('login.user');
    Route::post('/registeruser', [TicketController::class, 'register'])->name('register.user');
Route::middleware('guest')->group(function () {

});
Route::middleware('auth')->group(function () {
    Route::get('/ticketlist', [UserController::class, 'ticketlists'])->name('ticket.list');
    Route::post('/ticketsview/{id}/{source}', [TicketController::class, 'viewTicket'])->name('tickets.view');
// Route::post('/change-status/{id}/{source}', [TicketController::class, 'ticketstatus'])->name('change-status');
Route::match(['get', 'post'], '/change-status/{id}/{source}', [TicketController::class, 'ticketstatus'])->name('change-status');
Route::post('/update-note/{id}/{source}', [TicketController::class, 'updateNote'])->name('admin.note.update');

    Route::post('/logout', [UserController::class, 'logout'])->name('logout');

    
});