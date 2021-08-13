<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\CarComment;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    public function index(){
         
        return view("admin.review");
    }
    public function review()
    {
        $output = "";
        $car_comments = CarComment::orderBy("id", "DESC")->get();
        if (count($car_comments) > 0) {
            $output .= "  <div class='table-responsive'>
            <table class='table'>
               <thead>
                <tr>
                    <th>Id</th>
                    <th>User Name</th>
                    <th>Car Name</th>
                    <th>Comments</th>
                    <th>Reviews</th>
                    <th>Delete</th>
                </tr>
               </thead>";
            foreach ($car_comments as $comment) {
                $output .= " <tr>
                <td>{$comment->id}</td>
                <td>{$comment->customars->username}</td>
                <td>{$comment->cars->car_name}</td>
                <td>{$comment->comment}</td>
                <td>{$comment->review}</td>
                <td><button data-id='{$comment->id}' class='btn btn-danger' id='delete-review'>Delete</button></td>
            </tr>";
            }
            $output .= "</tbody>
         </table>
     </div>";
     echo $output;
        } else {
            echo "<h4>Customar Not Found</h4>";
        }
    }

    public function delete(Request $request)
    {
        $id=$request->id;
        $review=CarComment::find($id);
        $result=$review->delete();
        if($result){
            echo 1;
        }else{
            echo 0;
        }
        
    }
}
