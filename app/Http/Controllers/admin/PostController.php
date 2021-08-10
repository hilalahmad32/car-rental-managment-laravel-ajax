<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Posts;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    public function index()
    {
        $category = Category::all();
        return view("admin.posts", ["category" => $category]);
    }
    public function get()
    {
        $output = "";
        $posts = Posts::orderBy("id", "DESC")->get();
        if (count($posts) > 0) {
            $output .= "
            <div class='table-responsve'>
                <table class='table table-bordered'>
                    <thead>
                        <tr>
                            <td>Post id</td>
                            <td>Post Title</td>
                            <td>Post Category</td>
                            <td>Post image</td>
                            <td>Username</td>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>";
            foreach ($posts as $post) {
                $image = asset("upload/posts/" . $post->image);
                $output .= "
                        <tr>
                            <td>{$post->id}</td>
                            <td>{$post->title}</td>
                            <td>{$post->category->cat_name}</td>
                            <td><img src='{$image}' style='width:50px;height=50px;' alt=''></td>
                            <td>{$post->users->username}</td>
                            <td><button class='btn btn-success' data-id='{$post->id}' id='post-edit-btn' data-toggle='modal' data-target='#editpost'>Edit</button></td>
                            <td><button class='btn btn-danger' data-id='{$post->id}' id='post-delete-btn'>Delete</button></td>
                        </tr>";
            }
            $output .= '
                </tbody>
                </table>
                </div>';
            echo $output;
        } else {
            echo "<h1>Record not found</h1>";
        }
    }

    public function search(Request $request)
    {
        $output = "";
        $search = '%' . $request->search . "%";
        $posts = Posts::orderBy("id", "DESC")->where("title", "like", $search)->get();
        if (count($posts) > 0) {
            $output .= "
            <div class='table-responsve'>
                <table class='table table-bordered'>
                    <thead>
                        <tr>
                            <td>Post id</td>
                            <td>Post Title</td>
                            <td>Post Category</td>
                            <td>Post image</td>
                            <td>Username</td>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>";
            foreach ($posts as $post) {
                $image = asset("upload/posts/" . $post->image);
                $output .= "
                        <tr>
                            <td>{$post->id}</td>
                            <td>{$post->title}</td>
                            <td>{$post->category->cat_name}</td>
                            <td><img src='{$image}' style='width:50px;height=50px;' alt=''></td>
                            <td>{$post->users->username}</td>
                            <td><button class='btn btn-success' data-id='{$post->id}' id='post-edit-btn' data-toggle='modal' data-target='#editpost'>Edit</button></td>
                            <td><button class='btn btn-danger' data-id='{$post->id}' id='post-delete-btn'>Delete</button></td>
                        </tr>";
            }
            $output .= '
                </tbody>
                </table>
                </div>';
            echo $output;
        } else {
            echo "<h1>Record not found</h1>";
        }
    }

    public function create(Request $request)
    {
        $car = new Posts();

        $image = $request->file("image");
        $new_image = rand() . "." . $image->extension();
        $image->move(public_path("upload/posts"), $new_image);


        $car->cat_id = $request->cat_id;
        $car->user_id = Auth::user()->id;
        $car->title = $request->title;
        $car->description = $request->desc;
        $car->image = $new_image;
        $result = $car->save();
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    }
    public function edit(Request $request)
    {
        $output = "";
        $id = $request->id;
        $category = Category::all();
        $post = Posts::find($id);
        $image = asset("upload/posts/" . $post->image);
        // echo $image;
        $output .= "<div class='form-group'>
                                <label for=''>Enter Car Name</label>
                                <input type='hidden' value='{$post->id}' name='edit_post_id' id='edit_post_id' class='form-control form-control-lg'>
                                <input type='text' value='{$post->title}' name='edit_post_name' id='edit_post_name' class='form-control form-control-lg'>
                            </div>
                            <div class='form-group'>
                                <label for=''>Enter Car Category</label>
                                <select name='edit_cat_id' id='edit_cat_id' class='form-control form-control-lg'>
                                    <option disabled selected>Select Car category</option>";
        foreach ($category as $cat) {
            if ($cat->id == $post->cat_id) {
                $select = "selected";
            } else {
                $select = "";
            }
            $output .= "<option {$select} value='{$cat->id}'>{$cat->cat_name}</option>";
        }
        $output .= "</select>
                            </div>
                            <div class='form-group'>
                                <label for=''>Enter Car Description</label>
                                <textarea name='edit_desc' id='edit_desc' cols='30' rows='10'
                                    class='form-control form-control-lg'>{$post->description}</textarea>
                            </div>
                            <div class='form-group'>
                                <label for=''>Enter Car Image</label>
                                <input type='file' name='new_image' id='new_image' class='form-control form-control-lg'>
                                <img src='{$image}' class='img-fluid' style='width:50px;height:50px;' alt=''>
                                  <input type='text' value='{$post->image}' name='old_img' id='old_img' class='form-control form-control-lg'>
                            </div>";
        echo $output;
    }

    public function update(Request $request)
    {

        $post = Posts::find($request->edit_post_id);
        if ($request->hasFile("new_image")) {
            $destination = public_path("upload\\posts\\" . $post->image);
            if (File::exists($destination)) {
                unlink($destination);
            }
            $image = $request->file("new_image");
            $new_image = rand() . "." . $image->extension();
            $image->move(public_path("upload/posts"), $new_image);
            $post->image = $new_image;
        } else {
            $post->image = $request->old_img;
        }
        $post->cat_id = $request->edit_cat_id;
        $post->user_id = Auth::user()->id;
        $post->title = $request->edit_post_name;
        $post->description = $request->edit_desc;
        $result = $post->save();
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    }


    public function delete(Request $request)
    {
        $id = $request->id;
        $posts = Posts::find($id);
        $images = public_path("upload\\posts\\" . $posts->image);
        if (File::exists($images)) {
            unlink($images);
        }
        $result = $posts->delete();
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    }
}
