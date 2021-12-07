<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location;


class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified','ticket']);
    }

    public function index()
    {
        if (request()->has('menu')) {
            $menu = request()->get('menu');
        } else {
            $menu = 'dash';
        }
        return view('layouts.user.home', [
            'menuUrl' => $menu]);
    }

    public function profile()
    {
        if (request()->has('menu')) {
            $menu = request()->get('menu');
        } else {
            $menu = 'profile';
        }
        return view('layouts.user.home', ['menuUrl' => $menu]);
    }

    public function bookTicket()
    {
        if (request()->has('menu')) {
            $menu = request()->get('menu');
        } else {
            $menu = 'bookTicket';
        }
        return view('layouts.user.home', ['menuUrl' => $menu]);
    }

    public function history()
    {
        if (request()->has('menu')) {
            $menu = request()->get('menu');
        } else {
            $menu = 'history';
        }
        return view('layouts.user.home', ['menuUrl' => $menu]);
    }

    public function active()
    {
        if (request()->has('menu')) {
            $menu = request()->get('menu');
        } else {
            $menu = 'active';
        }
        return view('layouts.user.home', ['menuUrl' => $menu]);

    }
}
