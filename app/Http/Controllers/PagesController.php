<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;

// use Illuminate\Support\Facades\Http;

class PagesController extends Controller
{
    //

    public function index()
    {
        $state = json_decode(file_get_contents("apis/state-api.json"));

        return view('layouts.general.welcome', [
            'states' => $state->data
        ]);
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
        $state = json_decode(file_get_contents("apis/state-api.json"));
        return view('layouts.general.ticket', [
            'states' => $state->data
        ]);
    }

    public function showFlightSelectionPage()
    {
        return view('layouts.general.flight-selection');
    }


}
