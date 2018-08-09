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
    テスト
@endsection