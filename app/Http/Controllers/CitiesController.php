<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\library\Api;

class CitiesController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return view('cities.index', compact('cities'));
    }
    
    public function show($id)
    {
        # 都市コードの取得
        $city = City::find($id);
        
        # 天気の取得
        $weather = Api::fetchWeather($city->city_code);
        
        # ニュースの取得
        // $news = Api::fechNews($city->country_name);
        
        return view('cities.show',compact('city','weather', 'news'));
        
        /* $currency スクレイピングするか未定 */
        /* $news = Api::fetchNews($news); */
        //  return view('welcome',compact('weather','currency','news'));
    }
}
