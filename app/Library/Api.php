<?php

namespace App\library;
use Illuminate\Http\Request;

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
        
        return($weather);
    }
    
    // BingNewsSearch api v7
    public static function fetchNews($country_name) {
        # set access key
        $accessKey = '819b0d7f18eb4bbc9665a3596cdd3c25';

        # set API Endpoint
        $endpoint = 'https://api.cognitive.microsoft.com/bing/v7.0/news/search';
        
        # set required parameters
        $term = $keyword;

        function BingNewsSearch ($url, $key, $query) {
            # Prepare HTTP request
            $headers = "Ocp-Apim-Subscription-Key: $key\r\n";
            $options = array ('http' => array (
                            'header' => $headers,
                            'method' => 'GET' ));

            # Perform the Web request and get the JSON response
            $context = stream_context_create($options);
            $result = file_get_contents($url . "?q=" . urlencode($query) . "&mkt=ja-jp", false, $context);

            # Extract Bing HTTP headers
            $headers = array();
            foreach ($http_response_header as $k => $v) {
                $h = explode(":", $v, 2);
                if (isset($h[1]))
                if (preg_match("/^BingAPIs-/", $h[0]) || preg_match("/^X-MSEdge-/", $h[0]))
                    $headers[trim($h[0])] = trim($h[1]);
            }
            
            #return header and result
            return array($headers, $result);
        }
        
        # get the (still encoded) JSON data
        list( , $json) = BingNewsSearch($endpoint, $accessKey, $term);

        # Decode JSON response
        $news = json_decode($json, true);
        
        # dd($news);
        return($news);
    }
}