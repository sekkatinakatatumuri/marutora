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
        
        dd($id);
        
        // 都市データの取得
        $city = City::find($id);
        
        // 天気の取得
        $weather = Api::fetchWeather($city->city_code);
        
        // ニュースの取得
        // $news = Api::fechNews($city->country_name);
        
        // スクレイピングした為替データ(どっから取るか選定)
        // $currency = Currency::where("JPY")->get();
        
        return view('cities.show',compact('city','weather', 'news'));
    }
}
