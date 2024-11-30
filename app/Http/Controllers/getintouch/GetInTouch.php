<?php

namespace App\Http\Controllers\getintouch;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http; // Import Http facade

class GetInTouch extends Controller
{
  public function index()
  {
    // Get the authenticated user
    $user = Auth::user();

    // Call the 'Get In Touch' API to fetch data
    $response = Http::withoutVerifying()->get('https://devashishsoni.site/api/get-in-touch');

    $contacts = $response->json();

    // Pass the user and contacts to the view
    return view('content.getintouch.getintouch', compact('user', 'contacts'));
  }
}
