<?php

namespace App\Http\Controllers\customar;

use App\Http\Controllers\Controller;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LikeController extends Controller
{
    public function create(Request $request)
    {
        $like = new Like();
        $user_id = session("loggedUser");
        $car_id=$request->id;
        // $is_like = Like::where("cus_id", $user_id)->first();
        $is_like=DB::table('likes')->where(["cus_id"=>$user_id,"car_id"=>$car_id])->first();
        // return $is_like;
        if ($is_like) {
         DB::table('likes')->where(["cus_id"=>$user_id,"car_id"=>$car_id])->delete();
        } else {
            $like->cus_id = $user_id;
            $like->car_id = $car_id;
            $like->like =1;
            $like->save();
        }
    }

    public function get(Request $request)
    {
        $output = "";
        $like = Like::where("car_id", $request->id)->sum("like");
        // if(count($like) > 0){
        
                $output .= "
                <span>" . $like . "</span>";
            echo $output;
       
        // }
    }
}
