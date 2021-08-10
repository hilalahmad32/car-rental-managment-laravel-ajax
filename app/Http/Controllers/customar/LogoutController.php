<?php

namespace App\Http\Controllers\customar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    public function logout(){
        if(session()->has("loggedUser") || session()->has("email")){
            session()->pull("loggedUser");
            session()->pull("email");
            return redirect("/");
        }
    }
}