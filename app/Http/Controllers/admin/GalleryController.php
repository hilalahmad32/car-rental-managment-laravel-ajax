<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Gellary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class GalleryController extends Controller
{
    public function index()
    {
        return view("admin.gallery");
    }

    public function create(Request $request)
    {
        $gallery = new Gellary();

        $image = $request->file("file");
        $new_image = rand() . "." . $image->extension();
        $image->move(public_path("upload/gallery"), $new_image);

        $gallery->user_id = Auth::user()->id;
        $gallery->gallery = $new_image;
        $result = $gallery->save();
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function get()
    {
        $output = "";
        $gallery = Gellary::orderBy("id", "DESC")->get();
        if (count($gallery) > 0) {
            $output .= "
             <div class='table-responsive'>
                <table class='table'>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Username</th>
                            <th>Gallery</th>
                            <th>Edit</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>";
            foreach ($gallery as $gal) {
                $output .= "
                        <tr>
                        <td>{$gal->id}</td>
                        <td>{$gal->users->username}</td>
                        <td><img src='/upload/gallery/{$gal->gallery}' style='width:60px;height:60px;'></td>
                        <td><button data-id='{$gal->id}' data-target='#edit-gallerys' data-toggle='modal' class='btn btn-success' id='edit-gallery'>Edit</button></td>
                        <td><button data-id='{$gal->id}' class='btn btn-danger' id='delete-gallery'>Delete</button></td>
                        </tr>
                        ";
            }
            $output .= "</tbody>
                </table>
            </div>";

            echo $output;
        } else {
            echo "<h1>Record Not Found</h1>";
        }
    }

    
    public function edit(Request $request)
    {
        $id = $request->id;
        $gallery = Gellary::find($id);
        $output = "";
        $output .= " <div class='form-group'>
                <label for=''>Enter Image</label>
                <input type='text' value='{$gallery->id}' name='id' id='id' class='form-control form-control-lg'>
                <input type='file' name='new_file' id='new_file' class='form-control form-control-lg'>
                <img src='/upload/gallery/{$gallery->gallery}' style='height:100px;width:100px;'>
                <input type='text' value='{$gallery->gallery}' name='old_file' id='old_file' class='form-control form-control-lg'>
            </div>";
        echo $output;
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $gallery = Gellary::find($id);

        if ($request->hasFile("new_file")) {
            $destinaiton = public_path("upload\\gallery\\" . $gallery->gallery);
            if (File::exists($destinaiton)) {
                unlink($destinaiton);
            } else {
                $new_file = $request->file("new_file");
                $save_new_file = rand() . "." . $new_file->extension();
                $new_file->move(public_path("upload/gallery"), $save_new_file);
                $gallery->gallery = $save_new_file;
            }
        } else {
            $gallery->gallery = $request->old_file;
        }

        $result=$gallery->save();
        if($result){
            echo 1;
        }else{
            echo 0;
        }
    }

    public function delete(Request $request)
    {
        $id=$request->id;
        $gallery=Gellary::find($id);
        $destinaiton=public_path("upload\\gallery\\".$gallery->gallery);
        if(File::exists($destinaiton)){
            unlink($destinaiton);
        }

        $result=$gallery->delete();
        if($result){
            echo 1;
        }else{
            echo 0;
        }
    }
}
