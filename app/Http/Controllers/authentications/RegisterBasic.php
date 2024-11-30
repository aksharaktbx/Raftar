<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterBasic extends Controller
{

  public function index()
  {
    return view('content.authentications.auth-register-basic');
  }



  public function register(Request $request)
  {

    $request->validate([
      'UserName' => 'required',
      'email' => 'required|email|unique:users',
      'password' => 'required|min:6',
    ]);

    // Create the user
    $user = new User();
    $user->UserName = $request->UserName;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->save();
  }
}
