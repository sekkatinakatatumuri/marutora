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
    <h3 class="text-center">国旗から検索 <span class="glyphicon glyphicon-globe"></span></h3>
    <b><p class="text-center">ヨーロッパ</p></b>
    <div class="text-center nationalflag">
        @foreach ($cities as $city)
            <div>
                <p>{{$city->country_name}}</p>
                <a href="{{URL::to('/city/1')}}"><img src={{ asset($city->img_path) }} class="flag" alt="{{$city->country_name}}"></a>
            </div>
        @endforeach
    </div>
@endsection