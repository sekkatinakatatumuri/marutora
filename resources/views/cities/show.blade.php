@extends('layouts.app')

@section('cover')
    <div class="cover">
        <div class="cover-inner">
            <div class="cover-contents">
                <h1>旅先の情報をまるっと見よう！</h1>
                @if (!Auth::check())
                    <a href="{{ route('register') }}" class="btn btn-success btn-lg">まるトラを始める</a>
                @endif
            </div>
        </div>
    </div>
@endsection

@section('content')

    <h1>id = {{ $city->id }} の詳細ページ</h1>

    <p>国名: {{ $city->country_name }}</p>
    <p>都市: {{ $city->city_name }}</p>
    
    @include('items.weather', ['weather' => $weather])
    
@endsection