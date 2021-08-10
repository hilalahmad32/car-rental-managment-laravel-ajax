<?php

namespace App\Http\Controllers\customar;

use App\Http\Controllers\Controller;
use App\Models\CarComment;
use Illuminate\Http\Request;

class Comments extends Controller
{

    public function create(Request $request){
        $comment=new CarComment();
        $user_id=session("loggedUser");
        $comment->customar_id=$user_id;
        $comment->car_id=$request->id;
        $comment->review=$request->review;
        $comment->comment=$request->comment;
        $result=$comment->save();
       if($result){
           echo 1;
       }else{
           echo 0;
       }
    }

    public function getReview(Request $request)
    {
        $id=$request->id;
        $comment=CarComment::orderBy("id","DESC")->where("car_id",$id)->get();
        $output ="";
        if(count($comment) > 0){
            foreach($comment as $comments){
               $image=asset("upload/customar/{$comments->customars->image}");
                $output .="
                <div class='card mt-2'>
                <div class='card-header'>
                    <img src='{$image}'
                        style='width:40px;height:40px; border-radius:100%;' alt=''>
                    <span class='ml-3 text-3xl'>{$comments->customars->username}</span>
                </div>
                <div class='card-body'>
                    <div class='review text-primary'>";
                        if ($comments->review == 1){
                            $output .="<i class='fa fa-star' aria-hidden='true'></i>
                            <i class='fa fa-star-o' aria-hidden='true'></i>
                            <i class='fa fa-star-o' aria-hidden='true'></i>
                            <i class='fa fa-star-o' aria-hidden='true'></i>
                            <i class='fa fa-star-o' aria-hidden='true'></i>";
                        } elseif ($comments->review == 2){
                            $output .="<i class='fa fa-star' aria-hidden='true'></i>
                            <i class='fa fa-star' aria-hidden='true'></i>
                            <i class='fa fa-star-o' aria-hidden='true'></i>
                            <i class='fa fa-star-o' aria-hidden='true'></i>
                            <i class='fa fa-star-o' aria-hidden='true'></i>";
                        } elseif ($comments->review == 3){
                            $output .=" <i class='fa fa-star' aria-hidden='true'></i>
                            <i class='fa fa-star' aria-hidden='true'></i>
                            <i class='fa fa-star-o' aria-hidden='true'></i>
                            <i class='fa fa-star-o' aria-hidden='true'></i>
                            <i class='fa fa-star-o' aria-hidden='true'></i>";
                        } elseif ($comments->review ==4){
                            $output .="<i class='fa fa-star' aria-hidden='true'></i>
                            <i class='fa fa-star' aria-hidden='true'></i>
                            <i class='fa fa-star' aria-hidden='true'></i>
                            <i class='fa fa-star' aria-hidden='true'></i>
                            <i class='fa fa-star-o' aria-hidden='true'></i>";
                        } elseif ($comments->review == 5){
                            $output .=" <i class='fa fa-star' aria-hidden='true'></i>
                            <i class='fa fa-star' aria-hidden='true'></i>
                            <i class='fa fa-star' aria-hidden='true'></i>
                            <i class='fa fa-star' aria-hidden='true'></i>
                            <i class='fa fa-star' aria-hidden='true'></i>";
                        } else{
                            echo "Nothing";
                        }
                        $output .="</div>

                        <p>{$comments->comment} </p>
                        </div>
                    </div>";  

                    echo $output;
            }
        }
    }
}