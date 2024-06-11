<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class InstagramAPIController extends Controller
{
    public function index(Request $request)
    {
        $userData = [];

        if ($request->isMethod('POST')) {
            $userName = $request->user;
            // dd($userName);
            $response = Http::withHeaders([
                "x-rapidapi-host" => "instagram-scraper-api2.p.rapidapi.com",
                "x-rapidapi-key" => "6cbafd2697msh58c9eb8dd85559cp129dbcjsn4663af99fb9f"
            ])->get("https://instagram-scraper-api2.p.rapidapi.com/v1/info?username_or_id_or_url={$userName}");

            $userData = $response->json();
        }

        return view('InstagramAPI', compact('userData'));
    }
}
