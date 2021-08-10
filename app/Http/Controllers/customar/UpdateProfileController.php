<?php

namespace App\Http\Controllers\customar;

use App\Http\Controllers\Controller;
use App\Models\BookCar;
use App\Models\CarComment;
use App\Models\Comments;
use App\Models\Customar;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class UpdateProfileController extends Controller
{
    public function index()
    {
        $id = session("loggedUser");
        $profile = Customar::find($id);
        $account = Customar::find($id);
        return view("customar.update-profile", ["account" => $account, "profile" => $profile]);
    }

    public function update(Request $request)
    {
        $id = session("loggedUser");

        $update = Customar::find($id);

        if ($request->hasFile("edit_file")) {
            $destination = public_path("upload\\customar\\" . $update->image);
            if (File::exists($destination)) {
                unlink($destination);
            }

            $file = $request->file("edit_file");
            $new_file = rand() . "." . $file->extension();
            $file->move(public_path("upload/customar"), $new_file);
            $update->image = $new_file;
        } else {
            $update->image = $request->old_file;
        }
        $update->fname = $request->edit_fname;
        $update->lname = $request->edit_lname;
        $update->username = $request->edit_username;
        $update->email = $request->edit_email;
        $result = $update->save();
        if ($result) {
            return redirect(route("update-profile"))->with("success", "Profile Update Successfully");
        } else {
            return redirect(route("update-profile"))->with("error", "Profile Not Update Successfully");
        }
    }

    public function delete()
    {
        $id = session("loggedUser");
        CarComment::where("customar_id", $id)->delete();
        Comments::where("customar_id", $id)->delete();
        Like::where("cus_id", $id)->delete();
        BookCar::where("cus_id", $id)->delete();
        if (session()->has("loggedUser") && session()->has("email")) {
            session()->pull("loggedUser");
            session()->pull("email");
        }
        $customar = Customar::find($id);
        $destination = public_path("upload\\customar\\" . $customar->image);
        if (File::exists($destination)) {
            unlink($destination);
        }
        
        $result = $customar->delete();
        if ($result) {
            echo 1;
        } else {
            echo 0;
        }
    }
}
