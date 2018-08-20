<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Country;
use App\Library\Api;

class CitiesController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        return view('cities.index', compact('countries'));
    }
    
    public function show($id)
    {
        // 都市データの取得
        $country = Country::find($id);
        $cities = City::where('country_id', $id)->get();
        
        $weathers = [];
        foreach($cities as $city) {
            // 選択した首都の天気の取得
            $weathers[] = Api::fetchWeather($city->city_code);
        }

        // ニュースの取得(Azure使えるようにもどす)
        // $news = Api::fetchNews($country->country_name);
        
        // dd($news);
        // スクレイピングした為替データ(どっから取るか選定)
        // $currency = Currency::where("JPY")->get();
        
        // メッセージの取得(旅行サイト選定)
        return view('cities.show', compact('city','weathers'));
    }
}
