<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BookCar;
use App\Models\Car;
use App\Models\CarCategory;
use App\Models\CarComment;
use App\Models\Comments;
use App\Models\Customar;
use App\Models\Like;
use App\Models\Posts;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $categorys = CarCategory::all();
        $cars = Car::all();
        $posts = Posts::all();
        $customars = Customar::all();
        $likes = Like::orderBy("id", "DESC")->limit(6)->get();
        $car_comments = CarComment::orderBy("id", "DESC")->limit(6)->get();
        $car_books = BookCar::where("book", "confirm")->get();
        $comments = Comments::orderBy("id", "DESC")->limit(6)->get();
        $sumlikes = Like::sum("like");
        return view("admin.dashboard", ["customars" => $customars, "likes" => $likes, "sumlikes" => $sumlikes, "car_comments" => $car_comments, "comments" => $comments, "categorys" => $categorys, "cars" => $cars, "posts" => $posts, "car_books" => $car_books]);
    }

    public function get()
    {
        $output = "";
        $car_books = BookCar::orderBy("id", "DESC")->limit(6)->get();
        if (count($car_books) > 0) {
            $output .= " <div class='table-responsive'>
            <table class='table'>
               <thead>
                <tr>
                    <th>Id</th>
                    <th>User Name</th>
                    <th>Car Name</th>
                    <th>Days</th>
                    <th>Book</th>
                    <th>Update Status</th>
                </tr>
               </thead>
               <tbody>";
            foreach ($car_books as $book) {
                $output .= "
                <tr>
                <td>{$book->id}</td>
                <td>{$book->customar_books->username}</td>
                <td>{$book->book_car->car_name}</td>
                <td>{$book->days}</td>
                <td>{$book->book}</td>
                <td>
                    <button data-id='{$book->id}' id='confirm' class='btn btn-success'>Confirm</button>
                    <button data-id='{$book->id}' id='not-confirm' class='btn btn-danger'>Not</button>
                </td>
            </tr>";
            }
            $output .= " </tbody>
            </table>
        </div>";

            echo $output;
        }
    }

    public function confirm(Request $request)
    {
        $id = $request->id;
        $book = BookCar::find($id);
        $book->book = "confirm";
        $result = $book->save();
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    }
    public function not_confirm(Request $request)
    {
        $id = $request->id;
        $book = BookCar::find($id);
        $book->book = "not-confirm";
        $result = $book->save();
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function customars()
    {
        $output = "";
        $customars = Customar::orderBy("id", "DESC")->limit(6)->get();
        if (count($customars) > 0) {
            $output .= " <div class='table-responsive'>
            <table class='table'>
               <thead>
                <tr>
                    <th>Id</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>User Name</th>
                    <th>Email</th>
                    <th>Image</th>
                    <th>Delete</th>
                </tr>
               </thead>
               <tbody> ";
            foreach ($customars as $customar) {
                $image=asset("upload/customar/".$customar->image);
                $output .= " <tr>
                <td>{$customar->id}</td>
                <td>{$customar->fname}</td>
                <td>{$customar->lname}</td>
                <td>{$customar->username}</td>
                <td>{$customar->email}</td>
                <td><img src='{$image}' style='width:50px;height:50px;' alt=''></td>
                <td><button id='delete-customars' class='btn btn-danger'>Delete</button></td>
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
}
