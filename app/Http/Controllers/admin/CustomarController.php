<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Customar;
use Illuminate\Http\Request;

class CustomarController extends Controller
{
    public function index()
    {
        return view("admin.customars");
    }
    public function customars()
    {
        $output = "";
        $customars = Customar::orderBy("id", "DESC")->get();
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
