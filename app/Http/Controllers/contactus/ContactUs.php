<?php

namespace App\Http\Controllers\contactus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ContactUs extends Controller
{
  public function index()
  {
    $response = Http::withoutVerifying()->get('https://devashishsoni.site/api/contact-us');
    if ($response->successful()) {
      $data = $response->json()['data'];
      return view('content.contactus.contactus', compact('data'));
    } else {
      $errorMessage = 'Failed to retrieve users.';
      return view('content.contactus.contactus', ['errorMessage' => $errorMessage]);
    }
  }


  public function create()
  {

    return view('content.contactus.addcontact');
  }
  public function addvideo()
  {
    $response = Http::withoutVerifying()->get('https://devashishsoni.site/api/how-to-play-video');
    $video_link = $response->json()['video_link'] ?? null;
    return view('content.contactus.playvideo', compact('video_link'));
  }


  public function adddwalletvideo()
  {

    return view('content.contactus.playvideo');
  }
  public function createplayvideo()
  {

    return view('content.contactus.createplayvideo');
  }

  public function createwalletvideo()
  {

    return view('content.contactus.createwalletvideo');
  }

  public function store(Request $request)
  {

    $request->validate([
      'mobile_number' => 'required|string|max:15',
      'gmail' => 'required|email',
      'facebook_link' => 'nullable|url',
      'instagram_link' => 'nullable|url',
      'telegram_link' => 'nullable|url',
      'whatsapp_link' => 'nullable|url',
    ]);

    $response = Http::withoutVerifying()->post('https://devashishsoni.site/raftar786/public/api/contact-us', [
      'mobile_number' => $request->mobile_number,
      'gmail' => $request->gmail,
      'facebook_link' => $request->facebook_link,
      'instagram_link' => $request->instagram_link,
      'telegram_link' => $request->telegram_link,
      'whatsapp_link' => $request->whatsapp_link,
    ]);

    if ($response->successful()) {
      return redirect()->route('contact.create')->with('success', 'Contact information submitted successfully.');
    } else {
      return back()->with('error', 'Failed to submit contact information. Please try again.');
    }
  }

  public function storeplayvideo(Request $request)
  {
    $request->validate([
      'video_link' => 'required|string|max:255',

    ]);

    $response = Http::withoutVerifying()->post('https://devashishsoni.site/raftar786/public/api/how-to-play-video', [
      'video_link' => $request->video_link,

    ]);

    if ($response->successful()) {
      return redirect()->route('playvideo.create')->with('success', 'Video Link Update successfully.');
    } else {
      return back()->with('error', 'Failed to submit Video Link. Please try again.');
    }
  }
}
