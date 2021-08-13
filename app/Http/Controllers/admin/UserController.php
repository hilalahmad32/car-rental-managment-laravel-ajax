<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view("admin.admins");
    }

    public function get()
    {
        $output = "";
        $users = User::orderBy("id", "DESC")->get();
        if (count($users) > 0) {
            $output .= " <div class='table-responsive'>
            <table class='table table-bordered'>
                <thead>
                    <tr>
                        <th>User id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>User Name</th>
                        <th>User Email</th>
                        <th>User image</th>
                        <th>User Roll</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>";
            foreach ($users as $user) {
                $image = asset("upload/" . $user->image);
                $output .= "<tr>
                        <td>{$user->id}</td>
                        <td>{$user->fname}</td>
                        <td>{$user->lname}</td>
                        <td>{$user->username}</td>
                        <td>{$user->email}</td>
                        <td><img src='{$image}' style='width:50px;height:50px;'></td>
                        <td>User Roll</td>
                        <td><button id='user-edit' data-target='#edit-user' data-toggle='modal' data-id='{$user->id}' class='btn btn-success'>Edit</button></td>
                        <td><button id='user-delete' data-id='{$user->id}' class='btn btn-danger'>Delete</button></td>
                    </tr>";
            }
            $output .= "</body>
            </table>
            </div>";
            echo $output;
        }
    }

    public function edit(Request $request)
    {
        $output = "";
        $id = $request->id;
        $users = User::find($id);
        $image = asset("upload/" . $users->image);
        $output .= "<div>
        <label>First Name</label>

        <input id='edit_fname' value='{$users->fname}'  class='block form-control form-control-lg mt-1 w-full' type='text' name='edit_fname' autofocus />
        <input id='edit_id' value='{$users->id}'  class='block form-control form-control-lg mt-1 w-full' type='hidden' name='edit_id' autofocus />
    </div>
  
    <div class='mt-4'>
        <label>Last Name</label>
        <input id='edit_lname' value='{$users->lname}' class='block form-control form-control-lg mt-1 w-full' type='text' name='edit_lname'
             autofocus />
    </div>
  
    <div class='mt-4'>
        <label>Username</label>       
        <input id='edit_username' value='{$users->username}' class='block form-control form-control-lg mt-1 w-full' type='text' name='edit_username'
          autofocus />
    </div>

  
    <div class='mt-4'>
        <label>Email</label>     
        <input id='edit_email' value='{$users->email}' class='block form-control form-control-lg mt-1 w-full' type='email' name='edit_email'
             />
    </div>

    <div class='mt-4'>
        <label>Image</label>    
         <input id='new_image' class='block form-control form-control-lg mt-1 w-full' type='file' name='new_image'
             autofocus />
             <img src='{$image}' alt='' style='width:100px;height:100px;'>
             <input id='old_image' value='{$users->image}'  class='block form-control form-control-lg mt-1 w-full' type='hidden' name='old_image'
             autofocus />
    </div>";

        echo $output;
    }

    public function update(Request $request)
    {

        $id = $request->edit_id;
        $user = User::find($id);
        if($request->hasFile("new_image")){
            $destination=public_path("upload\\".$user->image);
            if(File::exists($destination)){
                unlink($destination);
            }
            $image = $request->file("new_image");
            $new_image = rand() . "." . $image->extension();
            $image->move(public_path("upload"), $new_image);
            $user->image = $new_image;
        }else{
            $user->image=$request->old_image;
        }
        $user->fname = $request->edit_fname;
        $user->lname = $request->edit_lname;
        $user->username = $request->edit_username;
        $user->email = $request->edit_email;
        $result=$user->save();
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    }

    public function delete(Request $request)
    {
        $id=$request->id;
        $user=User::find($id);
        $destination=public_path("upload\\".$user->image);
        if(File::exists($destination)){
            unlink($destination);
        }

        $result=$user->delete();
        if($result){
            echo 1;
        }else{
            echo 0;
        }
    }
}
