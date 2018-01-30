<?php

namespace App\Tests;

use App\WeatherProvider;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Th3Mouk\YahooWeatherAPI\YahooWeatherAPIInterface;

class WeatherProviderTest extends TestCase
{
    public function testGetCurrentWeather()
    {
        /** @var MockObject|YahooWeatherAPIInterface $weatherApi */
        $weatherApi = $this->createMock(YahooWeatherAPIInterface::class);
        $weatherApi
            ->expects($this->once())
            ->method('callApiCityName')
            ->with('Vilnius')
            ->will($this->returnValue(
                ['item' => ['condition' => ['text' => 'Cloudy', 'temp' => 13]]]
            ));

        $provider = new WeatherProvider($weatherApi);
        $this->assertSame('Cloudy (13 C)', $provider->getCurrentWeather());
    }
}
