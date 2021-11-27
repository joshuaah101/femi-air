<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //

    //testing login form
    public function userLoginPage(Request $req){

         $data = $req->input();
         $req->session()->put([
             'username'=> $data['username'],
             'password'=> $data['password']
            ]);

    }


}
