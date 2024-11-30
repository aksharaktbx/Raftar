<?php

namespace App\Http\Controllers\gamelist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class GameList extends Controller
{
  public function index()
  {
    $response = Http::withoutVerifying()->get('https://devashishsoni.site/api/games');
    if ($response->successful()) {
      $data = $response->json()['data'];
      return view('content.gamelist.gamelist', compact('data'));
    } else {
      $errorMessage = 'Failed to retrieve users.';
      return view('content.gamelist.gamelist', ['errorMessage' => $errorMessage]);
    }
  }

  public function gamerate()
  {
    $response = Http::withoutVerifying()->get('https://devashishsoni.site/api/game-rates');
    if ($response->successful()) {
      $data = $response->json()['data'];
      return view('content.gamelist.gamrerate', compact('data'));
    } else {
      $errorMessage = 'Failed to retrieve users.';
      return view('content.gamelist.gamrerate', ['errorMessage' => $errorMessage]);
    }
  }

  public function creategame(Request $request)
  {

    return view('content.gamelist.gameadd');
  }

  public function storegame(Request $request)
  {
    $validated = $request->validate([
      'game_name' => 'required',
      'open_time' => 'required',
      'open_time_sort' => 'required',
      'close_time' => 'required',
      'msg_status' => 'required|integer',
      'open_result' => 'nullable',
      'close_result' => 'nullable',
      'open_duration' => 'required|integer',
      'close_duration' => 'required|integer',
      'time_srt' => 'required|date_format:Y-m-d H:i:s',
      'web_chart_url' => 'required|url',
      'note' => '',
      'msg' => '',
    ]);

    $apiUrl = 'https://devashishsoni.site/api/sattamatka/game';

    try {
      $response = Http::withoutVerifying()->post($apiUrl, $validated);

      if ($response->successful()) {
        return redirect()->route('game-add')->with('success', 'Game added successfully.');
      } else {
        return back()->with('error', $response->json()['message'] ?? 'An error occurred.');
      }
    } catch (\Exception $e) {
      return back()->with('error', $e->getMessage());
    }
  }


  public function gamerateadd()
  {
    return view('content.gamelist.addgamerate');
  }

  public function gamechart()
  {
    $response = Http::withoutVerifying()->get('https://devashishsoni.site/api/game-charts');
    if ($response->successful()) {
      $data = $response->json()['data'];
      return view('content.gamelist.gamechart', compact('data'));
    } else {
      $errorMessage = 'Failed to retrieve game charts.';
      return view('content.gamelist.gamechart', ['errorMessage' => $errorMessage]);
    }
  }

  public function gamechartstore(Request $request)
  {
    $request->validate([
      'game_name' => 'required|string|max:15',
      'jodiUrl' => 'required|url',
      'panelUrl' => 'required|url',
    ]);

    $response = Http::withoutVerifying()->post('https://devashishsoni.site/api/game-charts', [
      'game_name' => $request->game_name,
      'jodiUrl' => $request->jodiUrl,
      'panelUrl' => $request->panelUrl,
    ]);

    if ($response->successful()) {
      return redirect()->route('game-chart')->with('success', 'Game chart created successfully.');
    } else {
      return back()->with('error', 'Failed to create game chart. Please try again.');
    }
  }

  public function gamechartcreate()
  {
    return view('content.gamelist.addgamechart');
  }

  // New Method: Delete Game Chart
  public function destroy($id)
  {
    // Send a DELETE request to the external API
    $response = Http::withoutVerifying()->delete("https://devashishsoni.site/api/game-charts/{$id}");

    // Check the response and return feedback
    if ($response->successful()) {
      return redirect()->route('game-chart')->with('success', 'Game chart deleted successfully.');
    } else {
      return redirect()->route('game-chart')->with('error', 'Failed to delete game chart. Please try again.');
    }
  }
}
