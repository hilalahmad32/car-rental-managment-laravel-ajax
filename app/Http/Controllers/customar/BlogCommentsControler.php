<?php

namespace App\Http\Controllers\customar;

use App\Http\Controllers\Controller;
use App\Models\Comments;
use Illuminate\Http\Request;

class BlogCommentsControler extends Controller
{
    public function create(Request $request){
        $comment=new Comments();
        $user_id=session("loggedUser");
        $comment->customar_id=$user_id;
        $comment->post_id=$request->id;
        $comment->comment=$request->comment;
        $result=$comment->save();
       if($result){
           echo 1;
       }else{
           echo 0;
       }
    }

    public function getCommets(Request $request)
    {
        $id=$request->id;
        $comments=Comments::orderBy("id","DESC")->where("post_id",$id)->get();
        $output ="";
        if(count($comments) > 0){
           foreach ($comments as $comment){
            $image=asset("upload/customar/{$comment->blog_customars->image}");
            $output .="<div class='card mt-2'>
                <div class='card-header'>
                    <img src='{$image}'
                        style='width:40px;height:40px; border-radius:100%;' alt=''>
                    <span class='ml-3 text-3xl'>{$comment->blog_customars->username}</span>
                </div>
                <div class='card-body'>
                    <p>
                        {$comment->comment}
                    </p>
                </div>
            </div>";
           }
           
            echo $output;
        }
    }
}