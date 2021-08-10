<?php

namespace App\Http\Controllers\customar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(){
       return view("customar.gallery");
   }
}