@extends('layouts.app')

@section('cover')
    <div class="cover">
        <div class="cover-inner">
            <div class="cover-contents">
                <h1>旅先の情報をまるっと見よう！</h1>
                @guest
                    <a href="{{ route('register') }}" class="btn btn-success btn-lg">まるトラを始める</a>
                @endguest
            </div>
        </div>
    </div>
@endsection

@section('content')
    @auth
        <h3 class="text-center">国旗から検索 <span class="glyphicon glyphicon-globe"></span></h3>
        <b><p class="text-center">ヨーロッパ</p></b>
        <div class="text-center nationalflag">
            @foreach ($countries as $country)
                <div>
                    <p>{{ $country->country_name }}</p>
                    <a href="{{ route('city.show', $country->id) }}"><img src="{{ asset($country->img_path) }}" class="flag" alt="{{ $country->country_name }}"></a>
                </div>
            @endforeach
        </div>
    @endauth
    @guest
        <div><p>ログインしてけろ</p></div>
    @endguest
@endsection