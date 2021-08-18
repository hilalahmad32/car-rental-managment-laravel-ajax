<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CarCategory as ModelCategory;
use Illuminate\Support\Facades\File;

class CarCategory extends Controller
{
    public function index()
    {
        return view("admin.car-category");
       
    }
    public function totalCount()
    {
        $output="";
        $total=ModelCategory::all();
        $output .=count($total);
        echo $output;
    }

    public function loadData()
    {
        $output="";
        $category=ModelCategory::orderBy("id","DESC")->get();
        if(count($category) > 0){
       $output .=" <div class='table-responsive'>
                <table class='table table-bordered'>
                    <thead>
                        <tr>
                            <th>Category Id</th>
                            <th>Category Name</th>
                            <th>Category Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>";
            foreach($category as $cat){
                $image=asset("upload/car-category/".$cat->car_image);
                // echo $image;
                $output .="
                <tr>
                            <td>".$cat->id."</td>
                            <td>".$cat->car_cat_name."</td>
                            <td><img src='{$image}' alt='{$cat->car_cat_name}' style='width:50px;height:50px;'></td>
                            <td><button id='edit-btn' data-id='{$cat->id}' class='btn btn-success' data-toggle='modal' data-target='#editcategory'>Edit</button></td>
                            <td><button id='delete-btn' data-id='{$cat->id}' class='btn btn-danger'>Delete</button></td>
                </tr>
                ";
            }
                  $output .="</tbody>
                            </table>
                        </div>";
        echo $output;

        }else{
            echo "<h1>Data not found</h1>";
        }
    }
     public function searchData(Request $request)
    {
        $output="";
        $search='%'.$request->search.'%';
        $category=ModelCategory::orderBy("id","DESC")->where("car_cat_name","like",$search)->get();
        if(count($category) > 0){
       $output .=" <div class='table-responsive'>
                <table class='table table-bordered'>
                    <thead>
                        <tr>
                            <th>Category Id</th>
                            <th>Category Name</th>
                            <th>Category Status</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>";
            foreach($category as $cat){
                $image=asset("upload/car-category/".$cat->car_image);
                // echo $image;
                $output .="
                <tr>
                            <td>".$cat->id."</td>
                            <td>".$cat->car_cat_name."</td>
                            <td><img src='{$image}' alt='{$cat->car_cat_name}' style='width:50px;height:50px;'></td>
                            <td><button id='edit-btn' data-id='{$cat->id}' class='btn btn-success' data-toggle='modal' data-target='#editcategory'>Edit</button></td>
                            <td><button id='delete-btn' data-id='{$cat->id}' class='btn btn-danger'>Delete</button></td>
                </tr>
                ";
            }
                  $output .="</tbody>
                            </table>
                        </div>";
        echo $output;

        }else{
            echo "<h1>Data not found</h1>";
        }
    }
    public function create(Request $request){

        $category=new ModelCategory();

        $cat_name=$request->car_cat_name;
        $image=$request->file("car_img");
        $new_image=rand().".".$image->extension();
        $image->move(public_path("upload/car-category"),$new_image);

        $category->car_cat_name=$cat_name;
        $category->car_image=$new_image;
        $results=$category->save();
        if($results){
            echo 1;
        }else{
            echo 0;
        }
    }

    public function edit(Request $request)
    {
        $id=$request->id;
        $output="";
        $category=ModelCategory::find($id);

        $image=asset("upload/car-category/".$category->car_image);
        // echo $image;
        $output .="<div class='form-group'>
                                <label for=''>Enter Category</label>
                                <input type='hidden' value='{$category->id}' name='edit_car_cat_id'
                                    id='edit_car_cat_id' class='form-control form-control-lg'>
                                     <input type='text' value='{$category->car_cat_name}' name='edit_car_cat_name'
                                    id='edit_car_cat_name' class='form-control form-control-lg'>
                            </div>
                            <div class='form-group'>
                                <label for=''>Enter Image</label>
                                <input type='file' name='new_car_image' id='new_car_img'
                                    class='form-control form-control-lg form-control-file'>
                                <img src='{$image}' alt='' style='width:50px;height:50px;'>
                                <input type='hidden' value='{$category->car_image}' name='old_image' id='old_image'
                                    class='form-control form-control-lg form-control-file'>
                            </div>";
    echo $output;

    }

    public function update(Request $request)
    {
        $id=$request->edit_car_cat_id;
        // echo $id;
        $category=ModelCategory::find($id);
        // echo $category;
        if($request->hasFile("new_car_image")){
            $destination=public_path("upload\\car-category\\".$category->car_image);
            // echo $destination;
            if(File::exists($destination)){
                unlink($destination);
            }
            $image=$request->file("new_car_image");
            $edit_new_image=rand().".".$image->extension();
            $image->move(public_path("upload/car-category"),$edit_new_image);
            $category->car_image=$edit_new_image;
        }else{
          $category->car_image=$request->old_image;
        }

        $category->car_cat_name=$request->edit_car_cat_name;
        $result=$category->save();
        if($result){
            echo 1;
        }else{
            echo 0;
        }
        
    }


    public function delete(Request $request){
        $id=$request->id;
        $category=ModelCategory::find($id);
        $destination=public_path("upload\\car-category\\".$category->car_image);
        if(File::exists($destination)){
            unlink($destination);
        }
        $result=$category->delete();
        if($result){
            echo 1;
        }else{
            echo 0;
        }
    }
    
}