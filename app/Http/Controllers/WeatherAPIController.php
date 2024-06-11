<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherAPIController extends Controller
{
    public function index(Request $request)
    {
        $weatherData = [];

        if ($request->isMethod('POST')) {
            $cityName = $request->city;

            $response = Http::withHeaders([
                "X-RapidApi-Host" => "open-weather13.p.rapidapi.com",
                "X-RapidApi-Key" => "6cbafd2697msh58c9eb8dd85559cp129dbcjsn4663af99fb9f"
            ])->get("https://open-weather13.p.rapidapi.com/city/{$cityName}/EN");

            $weatherData = $response->json();
        }

        return view('WeatherAPI', compact('weatherData'));
    }
}
