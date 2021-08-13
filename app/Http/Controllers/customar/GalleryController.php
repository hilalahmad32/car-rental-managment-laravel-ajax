<?php

namespace App\Http\Controllers\customar;

use App\Http\Controllers\Controller;
use App\Models\Gellary;
use Illuminate\Http\Request;

class GalleryController extends Controller
{
    public function index(){
        $gallery=Gellary::all();
       return view("customar.gallery",["gallery"=>$gallery]);
   }
   
}