<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// use Illuminate\Support\Facades\Http;

class PagesController extends Controller
{
    //
    public function showLoginPage()
    {
        return view('layouts.general.login');
    }

    public function showTicketPage()
    {
        $state = json_decode(file_get_contents("apis/state-api.json"));

        return view('layouts.general.ticket', [
            'states' => $state->data
        ]);
    }

    public function showDashboardPage()
    {
        return view('layouts.user.home');
    }

    public function memberDashboardMenu(Request $req)
    {
        $menuUrl = $req->get('menu');
        return view('layouts.user.home', ['menuUrl' => $menuUrl]);
    }


}
