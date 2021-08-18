<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
// use App\Http\Middleware\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UpdateProfile extends Controller
{
    public function index()
    {
        $id=Auth::id();
        $profile=User::find($id);
        return view("admin.update-profile",["profile"=>$profile]);
    }
}
