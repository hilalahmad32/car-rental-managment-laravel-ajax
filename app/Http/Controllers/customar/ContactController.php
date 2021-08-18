<?php

namespace App\Http\Controllers\customar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index(){
	return view("customar.contact");
}
public function create(Request $request){
	$contact=new Contact();
$contact->name=$request->name;
$contact->email=$request->email;
$contact->message=$request->message;
$result=$contact->save();
if($result){
echo 1;
}else{
echo 0;
}
}
}
