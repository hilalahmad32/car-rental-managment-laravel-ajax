<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.add-admin');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        // dd($request->input());
        // $request->validate([
        //     'fname' => 'required|string|max:255',
        //     'lname' => 'required|string|max:255',
        //     'username' => 'required|string|max:255',
        //     'email' => 'required|string|email|max:255|unique:users',
        //     'image' => 'required',
        //     'password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);
        $is_email=User::where("email",$request->email)->first();
        if($is_email){
            echo 2;
        }else{
                $image=$request->file("image");
                $new_image=rand().".".$image->extension();
                $image->move(public_path("upload"),$new_image);
                
    
            $user = User::create([
                'fname' => $request->fname,
                'lname' => $request->lname,
                'username' => $request->username,
                'image'=>$new_image,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
    
            // event(new Registered($user));
            if($user){
                echo 1;
            }else{
                echo 0;
            }
        }
        

        // return redirect(RouteServiceProvider::ADMIN);
    }
}