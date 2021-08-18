<?php

namespace App\Http\Controllers\customar;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class Aboutcontroller extends Controller
{
    public function index()
    {
        $abouts=About::all();
        return view("customar.about",["abouts"=>$abouts]);
    }
}
