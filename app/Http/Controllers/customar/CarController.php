<?php

namespace App\Http\Controllers\customar;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\CarComment;
use Illuminate\Http\Request;

class CarController extends Controller
{
   public function index(){
       $car=Car::orderBy("id","DESC")->limit(10)->get();
       return view("customar.Car",["cars"=>$car]);
   }

   public function detail($id){
       $car=Car::find($id);
    return view("customar.car-detail",["cars"=>$car]);
   }
}