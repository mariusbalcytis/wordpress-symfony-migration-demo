<?php

namespace App\Controller;

use App\WeatherProvider;
use Symfony\Component\HttpFoundation\JsonResponse;

class MyController
{
    public function showTime(WeatherProvider $weatherProvider)
    {
        return new JsonResponse(['time' => time(), 'weather' => $weatherProvider->getCurrentWeather()]);
    }
}
