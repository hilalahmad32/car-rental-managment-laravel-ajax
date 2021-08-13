<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\BookCar;
use Illuminate\Http\Request;

class CarBookController extends Controller
{
    public function index()
    {
        return view("admin.car-book");
    }

    public function car_book()
    {
        $output = "";
        $car_books = BookCar::orderBy("id", "DESC")->get();
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
}
