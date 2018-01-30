<?php

namespace Maba\Application;

use Th3Mouk\YahooWeatherAPI\YahooWeatherAPIInterface;

class WeatherProvider
{
    private $weatherAPI;

    public function __construct(YahooWeatherAPIInterface $weatherAPI)
    {
        $this->weatherAPI = $weatherAPI;
    }

    public function getCurrentWeather()
    {
        $condition = $this->weatherAPI->callApiCityName('Vilnius')['item']['condition'];
        return $condition['text'] . ' (' . $condition['temp'] . ' C)';
    }
}
