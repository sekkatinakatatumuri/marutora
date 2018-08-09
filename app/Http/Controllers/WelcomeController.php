<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\library\Api;

class WelcomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $weather = "";
        
        return view('welcome', [
            'weather' => $weather,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        # structure declaration
        $weather = [];
        
        # Request from national flag
        $city_code = request()->id;
        $currency_code = request()->ccode;
        $keyword = request()->keyword;
        
        # Request from combo box
        $select = request()->select;
        
        if($select) {
            $select_parameters =  explode("," ,$select);
            $city_code = $select_parameters [0];
            $currency_code = $select_parameters [1];
            $keyword = $select_parameters [2];
        }
        
        $weather = Api::fetchWeather($city_code);
        
        /* $currency スクレイピングするか未定 */
        
        /* $news = Api::fetchNews($news); */
        
        return view('welcome', [
            'weather' => $weather,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
