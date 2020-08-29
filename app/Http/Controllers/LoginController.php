<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class LoginController extends Controller
{
    public function authenticate()
    {
        /*if (Auth::attempt(['name'=> $name, 'password' => $password]))
   
        {
            return redirect()->intended('dashboard');
        }*/
    }
}
