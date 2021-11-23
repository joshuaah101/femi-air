<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PagesController;

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


//Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [PagesController::class, 'welcomePage']);
Route::get('login', [PagesController::class, 'showLoginPage']);
Route::post('login', [LoginController::class, 'userLoginPage']);

Route::get('register', [PagesController::class, 'showSignupPage']);
Route::get('summary', [PagesController::class, 'showSummaryPage']);
Route::get('payment', [PagesController::class, 'showPaymentPage']);
Route::get('ticket', [PagesController::class, 'showTicketPage']);
Route::get('flight', [PagesController::class, 'showFlightSelectionPage']);


//dynamic menu across both user and admin dashboard area
Route::prefix('user')->get('home', [PagesController::class, 'userDashboard']);
Route::prefix('admin')->get('home', [PagesController::class, 'adminDashboard']);

//Post form routes
Route::post('ticket', function () {
    return view('layouts.general.ticket');
});

?>
