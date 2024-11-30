<?php

namespace App\Http\Controllers\usermanagement;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class UserManagement extends Controller
{
  public function index(Request $request)
  {
    $search = $request->input('search');
    $response = Http::withoutVerifying()->get('https://devashishsoni.site/api/users');
    $users = $response->json()['users'] ?? [];
    if ($search) {
      $users = array_filter($users, function ($user) use ($search) {
        return strpos($user['mobile_number'], $search) !== false;
      });
    }
    return view('content.usermanage.usermange', compact('users', 'search'));
  }
}
