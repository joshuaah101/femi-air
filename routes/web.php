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

Route::get('/', function () {
    return view('layouts.general.welcome');
});

//Auth::routes();

Route::get('/home', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('login', [pagesController::class, 'showLoginPage']);
Route::post('login', [LoginController::class, 'userLoginPage']);
Route::get('ticket', [PagesController::class, 'showTicketPage']);
Route::get('checkout', [PagesController::class, 'showCheckoutPage']);


//member dashboard area
Route::get('user/home', [PagesController::class, 'showDashboardPage']);

//[PagesController::class, 'memberDashboardPage']
Route::prefix('user')->get('home', [PagesController::class, 'memberDashboardMenu']);



?>
