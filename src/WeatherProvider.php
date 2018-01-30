<?php

namespace Maba\Application;

class WeatherProvider
{
    public function getCurrentWeather()
    {
        $yahooWeather = new \Th3Mouk\YahooWeatherAPI\YahooWeatherAPI();
        $condition = $yahooWeather->callApiCityName('Vilnius')['item']['condition'];
        return $condition['text'] . ' (' . $condition['temp'] . ' C)';
    }
}
