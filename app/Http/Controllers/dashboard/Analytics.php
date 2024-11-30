<?php

namespace App\Http\Controllers\dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class Analytics extends Controller
{
  public function index()
  {
    $user = Auth::user();
    $userResponse = Http::timeout(30) // 30 seconds timeout
      ->withoutVerifying()
      ->get('https://devashishsoni.site/raftar786/public/api/user-count');

    if ($userResponse->successful()) {
      $totalUsers = $userResponse->json('total_users_count');
      $activeUsers = $userResponse->json('active_users_count');
      $inactiveUsers = $userResponse->json('inactive_users_count');
    } else {
      $totalUsers = $activeUsers = $inactiveUsers = 0;
    }
    $depositResponse = Http::withoutVerifying()->get('https://devashishsoni.site/raftar786/public/api/total-deposit-count');
    if ($depositResponse->successful()) {
      $totalDepositAmount = $depositResponse->json('total_deposit_amount');
    } else {
      $totalDepositAmount = 0;
    }
    $withdrawResponse = Http::withoutVerifying()->get('https://devashishsoni.site/raftar786/public/api/total-withdraw-amount');
    if ($withdrawResponse->successful()) {
      $totalWithdrawAmount = $withdrawResponse->json('total_withdraw_amount');
    } else {
      $totalWithdrawAmount = 0;
    }
    $gamesResponse = Http::withoutVerifying()->get('https://devashishsoni.site/raftar786/public/api/total-games-count');
    if ($gamesResponse->successful()) {
      $totalGamesCount = $gamesResponse->json('total_games_count');
    } else {
      $totalGamesCount = 0;
    }
    $betsResponse = Http::withoutVerifying()->get('https://devashishsoni.site/raftar786/public/api/total-bets-count');
    if ($betsResponse->successful()) {
      $totalBetsCount = $betsResponse->json('total_bets_count');
    } else {
      $totalBetsCount = 0;
    }
    return view('content.dashboard.dashboards-analytics', compact(
      'user',
      'totalUsers',
      'activeUsers',
      'inactiveUsers',
      'totalDepositAmount',
      'totalWithdrawAmount',
      'totalGamesCount',
      'totalBetsCount'
    ));
  }
}
