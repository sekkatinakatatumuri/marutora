<?php


namespace App\library;
use Illuminate\Http\Request;

/**
 * OpenWeatherMapAPI
 */
class Api
{
    // OpenWheatherMap api
    public static function fetchWeather($city_code) {
        # set access key, required parameters
        $city_id = $city_code;
        $units = "metric";
        $APIKEY = "3baebe8732d7455a542057847c0e17f7";
        
        # initilize URL
        $url = "http://api.openweathermap.org/data/2.5/forecast?id=" . $city_id . "&units=" . $units . "&appid=" . $APIKEY;
        
        # get the (still encoded) JSON data
        $json = file_get_contents($url);
        
        # Decode JSON response
        $weather = json_decode($json, true);
        
        // dd($weather);
        return($weather);
    }
}