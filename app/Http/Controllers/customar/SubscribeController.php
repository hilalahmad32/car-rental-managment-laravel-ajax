<?php

namespace App\Http\Controllers\customar;

use App\Http\Controllers\Controller;
use App\Models\Subscribe;
use Illuminate\Http\Request;

class SubscribeController extends Controller
{
    public function subscribe(Request $request)
    {
        $sub=new Subscribe();

        $sub->email=$request->email;
        if($sub->save()){
            echo 1;
        }else{
            echo 0;
        }
    }
}
