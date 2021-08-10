<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        return view("admin.category");
    }

    public function get()
    {
        $output="";
        $category=Category::orderBy("id","DESC")->get();
        if(count($category) > 0){
            $output .="<div class='table-responsive'>
              <table class='table table-bordered'>
                    <thead>
                        <tr>
                            <th>Category ID</th>
                            <th>Category Name</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>";
                    foreach($category as $cat){
                        $output .="<tr>
                            <td>{$cat->id}</td>
                            <td>{$cat->cat_name}</td>
                            <td>{$cat->status}</td>
                            <td><button class='btn btn-success' id='cat-edit-btn' data-target='#editcat' data-toggle='modal' data-id='{$cat->id}'>Edit</button></td>
                            <td><button class='btn btn-danger' id='cat-delete-btn' data-id='{$cat->id}'>Delete</button></td>
                        </tr>";
                    }
                        
                    $output .="</tbody>
                </table>
                        </div>
            ";
            echo $output;
        }else{
            echo "<h1 class='text-center mt-2'>Record Not Found</h1>";
        }
    }

       public function search (Request $request)
    {
        $output="";
        $search="%".$request->search."%";
        $category=Category::orderBy("id","DESC")->where("cat_name","like",$search)->get();
        if(count($category) > 0){
            $output .="<div class='table-responsive'>
              <table class='table table-bordered'>
                    <thead>
                        <tr>
                            <th>Category ID</th>
                            <th>Category Name</th>
                            <th>Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>";
                    foreach($category as $cat){
                        $output .="<tr>
                            <td>{$cat->id}</td>
                            <td>{$cat->cat_name}</td>
                            <td>{$cat->status}</td>
                            <td><button class='btn btn-success' id='cat-edit-btn' data-target='#editcat' data-toggle='modal' data-id='{$cat->id}'>Edit</button></td>
                            <td><button class='btn btn-danger' id='cat-delete-btn' data-id='{$cat->id}'>Delete</button></td>
                        </tr>";
                    }
                        
                    $output .="</tbody>
                </table>
                        </div>
            ";
            echo $output;
        }else{
            echo "<h1 class='text-center mt-2'>Record Not Found</h1>";
        }
    }
    public function create(Request $request)
    {
        $category= new Category();

        $category->cat_name=$request->cat_name;
        $result=$category->save();
        if($result){
            echo 1;
        }else{
            echo 0;
        }
    }


    public function edit(Request $request){
        
        $output="";
        $id=$request->id;
        $category=Category::find($id);

        $output .="
         <div class='form-group'>
            <label for=''>Enter Category Name</label>
            <input type='hidden' value='{$category->id}' name='edit_cat_id' id='edit_cat_id' class='form-control form-control-lg'>
            <input type='text' value='{$category->cat_name}' name='edit_cat_name' id='edit_cat_name' class='form-control form-control-lg'>
        </div>
        ";
        echo $output;
    }


    public function update(Request $request){
        $category=Category::find($request->edit_cat_id);
        $category->cat_name=$request->edit_cat_name;
        $result=$category->save();
        if($result){
            echo 1;
        }else{
            echo 0;
        }
    }

      public function delete(Request $request){
        $id=$request->id;
        $category=Category::find($id);
        $result=$category->delete();
        if($result){
            echo 1;
        }else{
            echo 0;
        }
    }
}