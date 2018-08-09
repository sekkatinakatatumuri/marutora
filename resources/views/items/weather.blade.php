@if ($weather)
<div class="weather col-sm-12">
    <div class="inner">
    <h1 class="weather category">天気</h1>
    <h3>{{ $weather['city']['name'] }}</h3>
    @for ($i = 3; $i < 40; $i = $i + 8)
    <ul>
        @if ($weather['list'][$i]['weather'][0]['main'] === 'Clouds')
            <img src= {{ asset('/images/weather/26.png') }} class="weather" alt="曇り"></a>
        @elseif ($weather['list'][$i]['weather'][0]['main'] === 'Rain')
            <img src= {{ asset('/images/weather/12.png') }} class="weather" alt="雨"></a>
        @elseif ($weather['list'][$i]['weather'][0]['main'] === 'Mist')
            <img src= {{ asset('/images/weather/18.png') }} class="weather" alt="小雨"></a>
        @elseif ($weather['list'][$i]['weather'][0]['main'] === 'Clear')
            <img src= {{ asset('/images/weather/32.png') }} class="weather" alt="晴れ"></a>
        @elseif ($weather['list'][$i]['weather'][0]['main'] === 'Smoke')   
            <img src= {{ asset('/images/weather/20.png') }} class="weather" alt="霧"></a>
        @elseif ($weather['list'][$i]['weather'][0]['main'] === 'Snow')   
            <img src= {{ asset('/images/weather/16.png') }} class="weather" alt="雪"></a>
        @endif
        <li>日時：{{ $weather['list'][$i]['dt_txt'] }}</li>
        <li>天候：{{ $weather['list'][$i]['weather'][0]['main'] }}</li>
        <li>気温：{{ $weather['list'][$i]['main']['temp'] }} ℃</li>
        <li>湿度：{{ $weather['list'][$i]['main']['humidity'] }} %</li>
        <li>気圧：{{ $weather['list'][$i]['main']['pressure'] }} hPa</li>
        <li>風速：{{ $weather['list'][$i]['wind']['speed'] }} m/s</li>
    </ul>
    @endfor
    </div>
</div>
@endif
