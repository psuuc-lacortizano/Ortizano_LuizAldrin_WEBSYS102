<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{
    public function showWeather(Request $request)
    {
        $cities = $request->input('cities', ['London', 'New York', 'Tokyo']); // Default cities
        $weatherData = [];

        foreach ($cities as $city) {
            $weatherData[] = $this->fetchWeather($city ?? 'London');
        }

        return view('index', ['weatherData' => $weatherData]);
    }

    private function fetchWeather($city)
    {
        $apiKey = config('services.openweathermap.key');
        $response = Http::get("https://api.openweathermap.org/data/2.5/weather", [
            'q' => $city,
            'appid' => $apiKey,
            'units' => 'metric'
        ]);

        if ($response->successful()) {
            $data = $response->json();
            return [
                'city' => $data['name'],
                'temperature' => $data['main']['temp'],
                'description' => $data['weather'][0]['description'],
                'humidity' => $data['main']['humidity']
            ];
        } else {
            return [
                'city' => $city,
                'temperature' => 'N/A',
                'description' => 'Error fetching data',
                'humidity' => 'N/A'
            ];
        }
    }
}
