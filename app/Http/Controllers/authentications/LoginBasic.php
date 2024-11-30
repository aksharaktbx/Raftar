<?php

namespace App\Http\Controllers\authentications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginBasic extends Controller
{
  public function index()
  {
    return view('content.authentications.auth-login-basic');
  }

  public function logout()
  {
    Auth::logout(); // Log the user out
    return redirect()->route('auth-login'); // Redirect to the login page
  }
  public function login(Request $request)
  {

    $request->validate([
      'email' => 'required|string',
      'password' => 'required|string',
    ]);


    $credentials = $request->only('email', 'password');


    if (Auth::attempt($credentials)) {

      return redirect()->route('dashboard-analytics');
    }


    return redirect()->back()->withErrors([
      'email' => 'The provided credentials do not match our records.',
    ])->withInput($request->only('email'));
  }
}
