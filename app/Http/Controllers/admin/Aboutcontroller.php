<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class Aboutcontroller extends Controller
{
    public function index()
    {
        return view("admin.about");
    }

    public function addAbout(Request $request)
    {
        try {
            $about = new About();

            $oneTime = About::all();
            if (count($oneTime) > 0) {
                echo 2;
            } else {
                $file = $request->file("about_image");
                $new_file = rand() . "." . $file->extension();
                $file->move(public_path("upload/about"), $new_file);

                $about->about = $request->about;
                $about->about_image = $new_file;
                $result = $about->save();
                if ($result) {
                    echo 1;
                } else {
                    echo 0;
                }
            }
        } catch (Message $err) {
            throw $err;
        }
    }

    public function getAbout()
    {
        $output = "";
        $abouts = About::orderBy("id", "DESC")->get();
        if (count($abouts) > 0) {
            $output .= "<div class='table-responsive'>
              <table class='table table-bordered'>
                    <thead>
                        <tr>
                            <th>About ID</th>
                            <th>About Image</th>
                            <th>Descirption</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>";
            foreach ($abouts as $about) {
                $des = Str::limit($about->about, 200, '...');
                $image = asset("upload/about/" . $about->about_image);
                $output .= "<tr>
                            <td>{$about->id}</td>
                            <td><img src='{$image}' style='width:70px;height:70px'></td>
                            <td>{$des} <a href='#' id='read-more' data-id='{$about->id}' data-toggle='modal' data-target='#readMore'>ReadMore</a></td>
                            <td><button class='btn btn-success' id='about-edit-btn' data-target='#editabout' data-toggle='modal' data-id='{$about->id}'>Edit</button></td>
                            <td><button class='btn btn-danger' id='about-delete-btn' data-id='{$about->id}'>Delete</button></td>
                        </tr>";
            }

            $output .= "</tbody>
                </table>
                        </div>
            ";
            echo $output;
        } else {
            echo "<h1 class='text-center mt-2'>Record Not Found</h1>";
        }
    }


    public function readMore(Request $request)
    {
        $output = "";
        $id = $request->id;
        $des = About::find($id);

        $output .= "{$des->about}";
        echo $output;
    }

    public function editAbout(Request $request)
    {
        $output = "";
        $id = $request->id;
        $about = About::find($id);
        $image = asset("upload/about/" . $about->about_image);
        $output .= "<div class='form-group'>
                                <label for=''>Upload Image</label>
                                <input type='file' name='new_image' id='new_image' class='form-control form-control-lg'>
                                <input type='hidden' value='{$about->id}' name='id' id='id' class='form-control form-control-lg'>
                                <img src='{$image}' style='width:70px;height:70px;'>
                                <input type='text' value='{$about->about_image}' name='old_image' id='old_image' class='form-control form-control-lg'>
                            </div>
                            <div class='form-group'>
                                <label for=''>Enter About</label>
                                <textarea name='edit_about' id='edit_about' cols='30' rows='10' class='form-control form-control-lg'>{$about->about}</textarea>
                              
                            </div>";
        echo $output;
    }


    public function updateAbout(Request $request)
    {
        $id = $request->id;
        $about = About::find($id);
        if ($request->hasFile("new_image")) {
            $destination = public_path("upload\\about\\" . $about->about_image);
            if (File::exists($destination)) {
                unlink($destination);
            }

            $file = $request->file("new_image");
            $new_file = rand() . "." . $file->extension();
            $file->move(public_path("upload/about"), $new_file);
            $about->about_image = $new_file;
        } else {
            $about->about_image = $request->old_image;
        }

        $about->about = $request->edit_about;
        $result = $about->save();
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    }
public function deleteAbout(Request $request){
	$id=$request->id;
	$about=About::find($id);
	$result=$about->delete();
	if($result){
echo 1;
}else{ 
echo 0;
}
}
}
