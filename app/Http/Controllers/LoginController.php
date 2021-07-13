<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
    public function showLogin(){
        return view('layouts.general.login');
    }

    public function userLogin(Request $req){
         $data = $req->input();
         $req->session()->put([
             'username'=> $data['username'],
             'password'=> $data['password']
            ]);
            
    }

}
