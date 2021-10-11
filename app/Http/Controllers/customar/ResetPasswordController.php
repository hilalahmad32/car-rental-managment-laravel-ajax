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
        $account = $profile = Customar::find($id);
        //  = Customar::find($id); both were assigned to the same value so i removed one of them
        return view("customar.reset-password", ["account" => $account, "profile" => $profile]);
    }
    public function reset_password(Request $request)
    {
        $id=session("loggedUser");
        $valid_user=Customar::where("email",$request->email)
        // ->where('password',Hash::make($request->update_password))
        ->first();
        dd($valid_user);
        if($valid_user){
            $valid_user->password=Hash::make($request->new_password);
            $result=$valid_user->save();
            if ($result) {
                return redirect(route("reset-password"))->with("success", "Password reset Successfully");
            } else {
                return redirect(route("reset-password"))->with("error", "Password Not Update Successfully");
            }
        }
    }
}
