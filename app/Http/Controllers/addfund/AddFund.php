<?php

namespace App\Http\Controllers\addfund;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class AddFund extends Controller
{
  public function index()
  {
    $response = Http::withoutVerifying()->get('https://devashishsoni.site/raftar786/public/api/payment-screenshots');
    if ($response->successful()) {
      $screenshots = $response->json()['screenshots'];
      return view('content.walletmanagement.addwallet', compact('screenshots'));
    } else {
      $errorMessage = 'Failed to retrieve users.';
      return view('content.walletmanagement.addwallet', ['errorMessage' => $errorMessage]);
    }
  }
  public function qrcode()
  {

    $response = Http::withoutVerifying()->get('https://devashishsoni.site/raftar786/public/api/payment-screenshots');

    $data = $response->json()['data'] ?? [];
    // dd($data);


    return view('content.walletmanagement.qrcode', compact('data'));
  }



  public function withdraw()
  {
    $response = Http::withoutVerifying()->get('https://devashishsoni.site/raftar786/public/api/users/');
    if ($response->successful()) {
      $users = $response->json()['users'];
      return view('content.walletmanagement.addwithdraw', compact('users'));
    } else {
      $errorMessage = 'Failed to retrieve users.';
      return view('content.walletmanagement.addwithdraw', ['errorMessage' => $errorMessage]);
    }
  }

  public function storeaddfund(Request $request)
  {
    $request->validate([
      'user_id' => 'required',
      'amount' => 'required',
      'payment_method' => 'required',
    ]);
    $apiUrl = 'https://devashishsoni.site/raftar786/public/api/add-fund/' . $request->user_id;
    $response = Http::withoutVerifying()->post($apiUrl, [
      'amount' => $request->amount,
      'payment_method' => $request->payment_method,
    ]);
    if ($response->successful()) {
      return redirect()->route('add-fund')->with('success', 'Funds added successfully.');
    } else {
      $error = $response->json()['message'] ?? 'Failed to add funds. Please try again.';
      return back()->with('error', $error);
    }
  }
  public function storewithdraw(Request $request)
  {
    $request->validate([
      'user_id' => 'required', // User ID is mandatory
      'amount' => 'required|numeric|min:0.01', // Ensure a positive amount
      'payment_method' => 'required|string', // Payment method is mandatory
      'upi' => 'required|string', // UPI ID is required
    ]);

    // API Endpoint
    $apiUrl = 'https://devashishsoni.site/raftar786/public/api/withdraw/' . $request->user_id;

    // API Request
    $response = Http::withoutVerifying()->post($apiUrl, [
      'amount' => $request->amount,
      'payment_method' => $request->payment_method,
      'upi' => $request->upi,
    ]);

    // Handle Response
    if ($response->successful()) {
      return redirect()->route('withdraw-fund')->with('success', 'Withdrawal successful.');
    } else {
      $error = $response->json()['message'] ?? 'Failed to withdraw funds. Please try again.';
      return back()->with('error', $error);
    }
  }
}
