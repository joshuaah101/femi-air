<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index(Request $req)
    {
        $menuUrl = $req->get('menu');

        return view('layouts.admin.home', [
            'menuUrl' => $menuUrl
        ]);
    }

}
