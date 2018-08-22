<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\City;
use App\Country;
use App\Exchange;
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
        // 国データの取得
        $country = Country::find($id);
        // 都市データの取得
        $cities = City::where('country_id', $id)->get();
        
        $weathers = [];
        // 選択した国の都市の天気を取得
        foreach($cities as $city) {
            $weathers[] = Api::fetchWeather($city->city_code);
        }

        // ニュースの取得(Azure使えるようにもどす)
        // $news = Api::fetchNews($country->country_name);
        
        // 為替データの取得
        $exchange = Exchange::where('currency', $country->currency_code)->count();
        // 対応した通貨の場合
        if ($exchange === 1) {
            $exchange = Api::fechExchange($country->currency_code);
        } else {
            $exchange = [
                'text'=>'未対応通貨のため表示できません',
                'value'=>'N/A',
            ];
        }
        // メッセージの取得(旅行サイト選定)
        return view('cities.show', compact('city', 'weathers', 'exchange'));
    }
}
