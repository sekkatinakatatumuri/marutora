<?php

namespace App\library;
use Illuminate\Http\Request;

class Api
{
    /*
     * OpenWheatherMap api
    */
    public static function fetchWeather($city_code) {
        // パラメータセット
        $city_id = $city_code;
        $units = "metric";
        $APIKEY = config('const.OWM_API_KEY');

        // URLの設定
        $url = "http://api.openweathermap.org/data/2.5/forecast?id=" . $city_id . "&units=" . $units . "&appid=" . $APIKEY;
        
        // JSONを取得
        $json = file_get_contents($url);
        
        // JSONを配列に変換
        $weather = json_decode($json, true);
        
        return($weather);
    }
    
    /*
     * 1forge api
    */
    public static function fechExchange($currency) {
        // パラメータセット
        $from = $currency;
        $to = 'JPY';
        $quanity = '1';
        $APIKEY = config('const.1FORGE_API_KEY');

        // 1つの通貨から別の通貨に換算
        $url = 'https://forex.1forge.com/1.0.3/convert' . '?from=' . $from . '&to=' . $to . '&quantity=' . $quanity . '&api_key=' . $APIKEY;
        
        # 残りのリクエストの回数を確認
        # $url = "https://forex.1forge.com/1.0.3/quota?api_key=" . $APIKEY;
        
        # 通貨記号の一覧を取得
        # $url = "https://forex.1forge.com/1.0.3/symbols?api_key=" . $APIKEY;
        
        // JSONを取得
        $json = file_get_contents($url);
        
        // JSONを配列に変換
        $exchange = json_decode($json, true);
        
        return($exchange);
    }
    
    /*
     * BingNewsSearch api v7
    */
    public static function fetchNews($country_name) {
        # set access key
        $accessKey = config('const.BNS_API_KEY');

        # set API Endpoint
        $endpoint = 'https://api.cognitive.microsoft.com/bing/v7.0/news/search';
        
        # set required parameters
        $term = $country_name;

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