<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function log(Request $user){
        return 
        view('login2')->with('email' , $user->email)->with('password', $user->pwd); 
          }
}
