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
    <b><p class="text-center">アフリカ</p></b>
    <div class="text-center nationalflag">
        <a href="{{ URL::to('/welcome/create?id=360630&ccode=EGP&keyword=エジプト') }}"><img src={{ asset('/images/flag/flag055.png') }} class="flag" alt="エジプトの情報"></a>
    </div>
    @include('items.weather', ['weather' => $weather])
@endsection