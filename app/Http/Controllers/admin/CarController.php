<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Car;
use App\Models\CarCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class CarController extends Controller
{
    public function index(){
        $category=CarCategory::all();
        return view("admin.car",["category"=>$category]);
    }


    public function get()
    {
        $output="";
        $car=Car::orderBy("id","DESC")->get();
        if(count($car) > 0){
            $output .="
            <div class='table-responsve'>
                <table class='table table-bordered'>
                    <thead>
                        <tr>
                            <td>Car id</td>
                            <td>Car Name</td>
                            <td>Car Category</td>
                            <td>Car image</td>
                            <td>Car price</td>
                            <td>Username</td>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>";
                    foreach($car as $cars){
                        $image=asset("upload/cars/".$cars->car_image);
                        $output .="
                        <tr>
                            <td>{$cars->id}</td>
                            <td>{$cars->car_name}</td>
                            <td>{$cars->car_category->car_cat_name}</td>
                            <td><img src='{$image}' style='width:50px;height=50px;' alt=''></td>
                            <td>{$cars->car_price}</td>
                            <td>{$cars->users->username}</td>
                            <td><button class='btn btn-success' data-id='{$cars->id}' id='car-edit-btn' data-toggle='modal' data-target='#edit-car'>Edit</button></td>
                            <td><button class='btn btn-danger' data-id='{$cars->id}' id='car-delete-btn'>Delete</button></td>
                        </tr>";
                    }
                $output .='
                </tbody>
                </table>
                </div>';
            echo $output;
        }
    }

     public function search(Request $request)
    {
        $output="";
        $search="%".$request->search."%";
        $car=Car::orderBy("id","DESC")->where("car_name","like",$search)->get();
        if(count($car) > 0){
            $output .="
            <div class='table-responsve'>
                <table class='table table-bordered'>
                    <thead>
                        <tr>
                            <th>Car id</th>
                            <th>Car Name</th>
                            <th>Car Category</th>
                            <th>Car image</th>
                            <th>Car price</th>
                            <th>Username</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>";
                    foreach($car as $cars){
                        $image=asset("upload/cars/".$cars->car_image);
                        $output .="
                        <tr>
                            <td>{$cars->id}</td>
                            <td>{$cars->car_name}</td>
                            <td>{$cars->car_category->car_cat_name}</td>
                            <td><img src='{$image}' style='width:50px;height=50px;' alt=''></td>
                            <td>{$cars->car_price}</td>
                            <td>{$cars->users->username}</td>
                            <td><button class='btn btn-success' data-id='{$cars->id}' id='car-edit-btn' data-toggle='modal' data-target='#editcar'>Edit</button></td>
                            <td><button class='btn btn-danger' data-id='{$cars->id}' id='car-delete-btn'>Delete</button></td>

                        </tr>";
                    }
                $output .='
                </tbody>
                </table>
                </div>';
            echo $output;
        }
    }
    public function create(Request $request){
        $car=new Car();

        $image=$request->file("car_img");
        $new_image=rand().".".$image->extension();
        $image->move(public_path("upload/cars"),$new_image);


        $car->car_cat_id=$request->car_id;
        $car->user_id=Auth::user()->id;
        $car->car_name=$request->car_name;
        $car->car_desc=$request->desc;
        $car->car_price=$request->price;
        $car->car_image=$new_image;
        $result=$car->save();
        if($result){
            echo 1;
        }else{
            echo 0;
        }
    }

    public function edit(Request $request)
    {
        $output ="";
        $id=$request->id;
        $category=CarCategory::all();
        $car=Car::find($id);
        $image=asset("upload/cars/".$car->car_image);
        // echo $image;
        $output .="<div class='form-group'>
                                <label for=''>Enter Car Name</label>
                                <input type='hidden' value='{$car->id}' name='edit_car_id' id='edit_car_id' class='form-control form-control-lg'>
                                <input type='text' value='{$car->car_name}' name='edit_car_name' id='edit_car_name' class='form-control form-control-lg'>
                            </div>
                            <div class='form-group'>
                                <label for=''>Enter Car Category</label>
                                <select name='edit_car_cat_id' id='edit_car_cat_id' class='form-control form-control-lg'>
                                    <option disabled selected>Select Car category</option>";
                                    foreach($category as $cat){
                                        if($cat->id == $car->car_cat_id){
                                            $select="selected";
                                        }else{
                                            $select="";
                                        }
                                        $output .="<option {$select} value='{$cat->id}'>{$cat->car_cat_name}</option>";
                                    }
                                $output .="</select>
                            </div>
                            <div class='form-group'>
                                <label for=''>Enter Car Description</label>
                                <textarea name='edit_desc' id='edit_desc' cols='30' rows='10'
                                    class='form-control form-control-lg'>{$car->car_desc}</textarea>
                            </div>
                            <div class='form-group'>
                                <label for=''>Enter Car Image</label>
                                <input type='file' name='new_car_img' id='new_car_img' class='form-control form-control-lg'>
                                <img src='{$image}' class='img-fluid' style='width:50px;height:50px;' alt=''>
                                  <input type='text' value='{$car->car_image}' name='old_car_img' id='old_car_img' class='form-control form-control-lg'>
                            </div>
                            <div class='form-group'>
                                <label for=''>Enter Car Price</label>
                                <input type='text' value='{$car->car_price}' name='edit_price' id='edit_price' class='form-control form-control-lg'>
                            </div>";
        echo $output;
        
    } 
    public function update(Request $request){

        $car=Car::find($request->edit_car_id);
        if($request->hasFile("new_car_img")){
            $destination=public_path("upload\\cars\\".$car->car_image);
            if(File::exists($destination)){
                unlink($destination);
            }
            $image=$request->file("new_car_img");
            $new_image=rand().".".$image->extension();
        $image->move(public_path("upload/cars"),$new_image);
        $car->car_image=$new_image;
        }else{
            $car->car_image=$request->old_car_img;
        }
        $car->car_cat_id=$request->edit_car_cat_id;
        $car->user_id=Auth::user()->id;
        $car->car_name=$request->edit_car_name;
        $car->car_desc=$request->edit_desc;
        $car->car_price=$request->edit_price;
        $result=$car->save();
        if($result){
            echo 1;
        }else{
            echo 0;
        }
    }


    public function delete(Request $request)
    {
        $id=$request->id;
        $car=Car::find($id);
        $images=public_path("upload\\cars\\".$car->car_image);
        if(File::exists($images)){
            unlink($images);
        }
        $result=$car->delete();
        if($result){
            echo 1;
        }else{
            echo 0;
        }
    }
}