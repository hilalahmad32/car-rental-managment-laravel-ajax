<?php

namespace App\Http\Controllers\customar;

use App\Http\Controllers\Controller;
use App\Models\Customar;
use Illuminate\Http\Request;

class AccountController extends Controller
{
  public function index()
  {
      $id=session("loggedUser");
      $account=Customar::find($id);
    return view("customar.book-car",["account"=>$account]);
  }

}
