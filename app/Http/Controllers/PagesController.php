<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


// use Illuminate\Support\Facades\Http;

class PagesController extends Controller
{


    public function index()
    {
        return view('layouts.general.welcome');
    }


    public function showLoginPage()
    {
        return view('layouts.general.login');
    }

    public function showSignupPage()
    {
        return view('layouts.general.register');
    }

    public function showPaymentPage()
    {
        return view('layouts.general.payment');
    }

    public function showSummaryPage()
    {
        return view('layouts.general.summary-preview');
    }

    public function showTicketPage()
    {
        return view('layouts.general.ticket');
    }

    public function showFlightSelectionPage()
    {
        return view('layouts.general.flight-selection');
    }

    public function searchBooking()
    {
        return view('layouts.booking.search');
    }

}
