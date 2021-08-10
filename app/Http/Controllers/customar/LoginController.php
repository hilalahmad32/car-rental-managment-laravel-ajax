<?php

namespace App\Http\Controllers\customar;

use App\Http\Controllers\Controller;
use App\Models\Customar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index(){
        return view("customar.sign-in");
    }

    public function login(Request $request){
        $customar=Customar::where("email",$request->email)->first();
        if(!$customar){
            echo 2;
        }else{
            if(Hash::check($request->password, $customar->password)){
                $data=[
                    "loggedUser"=>$customar->id,
                    "email"=>$customar->email
                ];
                $request->session()->put($data);
                echo 1;
            }else{
                echo 0;
            }
        }
    }
}