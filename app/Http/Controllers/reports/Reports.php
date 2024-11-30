<?php

namespace App\Http\Controllers\reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;


class Reports extends Controller
{
  public function index()
  {
    $response = Http::withoutVerifying()->get('https://kotiboxglobaltech.com/raftar786/public/api/transaction-history');
    if ($response->successful()) {
      $transactions = $response->json()['transactions'];
      return view('content.reports.transactionhistory', compact('transactions'));
    } else {
      $errorMessage = 'Failed to retrieve users.';
      return view('content.reports.transactionhistory', ['errorMessage' => $errorMessage]);
    }
  }
  public function withdrawhistory()
  {

    $response = Http::withOptions(['verify' => false])
      ->get('https://devashishsoni.site/raftar786/public/api/transaction-history');


    if ($response->successful()) {
      $data = $response->json();
      $withdrawTransactions = collect($data['transactions'] ?? [])->filter(function ($transaction) {
        return $transaction['transaction_type'] === 'Withdraw';
      })->values()->toArray();
    } else {
      $withdrawTransactions = [];
    }

    return view('content.reports.withdrawhistory', ['transactions' => $withdrawTransactions]);
  }
  public function diposithistory()
  {
    try {
      $response = Http::get('https://devashishsoni.site/api/transaction-history');
      Log::info('API Response:', $response->json()); // Log the response to check if data is coming correctly

      if ($response->successful()) {
        $transactions = $response->json()['transactions'] ?? [];

        $depositTransactions = array_filter($transactions, function ($transaction) {
          return $transaction['transaction_type'] === 'Deposit';
        });

        return view('content.reports.deposithistory', [
          'transactions' => $depositTransactions,
        ]);
      }

      return view('content.reports.deposithistory')->with('transactions', []);
    } catch (\Exception $e) {
      Log::error('Error in diposithistory method:', ['error' => $e->getMessage()]);
      return view('content.reports.deposithistory')->with('transactions', []);
    }
  }



  public function bithistory()
  {
    $response = Http::withoutVerifying()->get('https://devashishsoni.site/raftar786/public/api/bets/all');
    if ($response->successful()) {
      $bets = $response->json()['bets'];
      return view('content.reports.bithistory', compact('bets'));
    } else {
      $errorMessage = 'Failed to retrieve users.';
      return view('content.reports.bithistory', ['errorMessage' => $errorMessage]);
    }
  }
}
