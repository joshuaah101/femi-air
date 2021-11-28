<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\UsersController;
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


Route::get('/', [PagesController::class, 'index']);
Route::get('login', [PagesController::class, 'showLoginPage']);
Route::post('login', [LoginController::class, 'userLoginPage']);

Route::get('register', [PagesController::class, 'showSignupPage']);
Route::post('register', [\App\Http\Controllers\Auth\RegisterController::class, 'register']);
Route::get('summary', [PagesController::class, 'showSummaryPage']);
Route::get('payment', [PagesController::class, 'showPaymentPage']);
Route::get('ticket', [PagesController::class, 'showTicketPage']);
Route::get('flight', [PagesController::class, 'showFlightSelectionPage']);


//dynamic menu across both user and admin dashboard area
// Users
Route::prefix('user')->group(function () {

    Route::get('/', [UsersController::class, 'index']);

});

// Admin
Route::prefix('admin')->group(function () {

    Route::get('/', [AdminController::class, 'index']);

});

//Post form routes
Route::post('ticket', function () {

    $state = json_decode(file_get_contents("apis/state-api.json"));

    return view('layouts.general.ticket', [
        'states' => $state->data
    ]);
});

