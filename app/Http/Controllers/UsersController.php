<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;


class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index(Request $req)
    {

        $state = json_decode(file_get_contents("apis/state-api.json"));
        $menuUrl = $req->get('menu');

        return view('layouts.user.home', [
            'menuUrl' => $menuUrl,
            'states' => $state->data
        ]);
    }
}
