<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Comments;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function index()
    {
        return view("admin.comments");
    }

    public function comments()
    {
        $output="";
        $comments = Comments::orderBy("id", "DESC")->limit(6)->get();
        if (count($comments) > 0) {
            $output .= " <div class='table-responsive'>
            <table class='table'>
               <thead>
                <tr>
                    <th>Id</th>
                    <th>User Name</th>
                    <th>Car Name</th>
                    <th>Comments</th>
                    <th>Delete</th>
                </tr>
               </thead>
               <tbody>";
            foreach ($comments as $comment) {
                $output .= "
                <tr>
                <td>{$comment->id}</td>
                <td>{$comment->blog_customars->username}</td>
                <td>{$comment->posts->title}</td>
                <td>{$comment->comment}</td>
                <td> <button class='btn btn-danger' data-id='{$comment->id}' id='delete-comment'>Delete</button> </td>
            </tr>";
            }
            $output .= " </tbody>
            </table>
        </div>";

            echo $output;
        }
    }

    public function delete(Request $request)
    {
        $id=$request->id;
        $review=Comments::find($id);
        $result=$review->delete();
        if($result){
            echo 1;
        }else{
            echo 0;
        }
        
    }
}
