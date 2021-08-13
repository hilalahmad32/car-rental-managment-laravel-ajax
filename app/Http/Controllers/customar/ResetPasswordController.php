<?php

namespace App\Http\Controllers\customar;

use App\Http\Controllers\Controller;
use App\Models\Customar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ResetPasswordController extends Controller
{
    public function index()
    {
        $id = session("loggedUser");
        $profile = Customar::find($id);
        $account = Customar::find($id);
        return view("customar.reset-password", ["account" => $account, "profile" => $profile]);
    }
    public function reset_password(Request $request)
    {
        $id=session("loggedUser");
        $is_email=Customar::where("email",$request->email)->first();
        if($is_email){
            $customar=Customar::find($id);
            $customar->password=Hash::make($request->update_password);
            $result=$customar->save();
            if ($result) {
                return redirect(route("reset-password"))->with("success", "Password reset Successfully");
            } else {
                return redirect(route("reset-password"))->with("error", "Password Not Update Successfully");
            }
        }
    }
}
