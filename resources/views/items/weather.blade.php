@if ($weathers)
    @foreach ($weathers as $weather) 
        <div class="weather col-sm-12">
            <div class="inner">
            <h1 class="weather category">天気</h1>
            <h3>{{ $weather['city']['name'] }}</h3>
            @for ($i = 3; $i < 40; $i = $i + 8)
                <ul>
                    @switch($weather['list'][$i]['weather'][0]['main'])
                        @case('Clouds')
                            <img src= {{ asset('/images/weather/26.png') }} class="weather" alt="曇り">
                            @break
        
                        @case('Rain')
                            <img src= {{ asset('/images/weather/12.png') }} class="weather" alt="雨">
                            @break

                        @case('Mist')
                            <img src= {{ asset('/images/weather/18.png') }} class="weather" alt="小雨">
                            @break
        
                        @case('Clear')
                            <img src= {{ asset('/images/weather/32.png') }} class="weather" alt="晴れ">
                            @break
        
                        @case('Smoke')
                            <img src= {{ asset('/images/weather/20.png') }} class="weather" alt="霧">
                            @break
        
                        @case('Snow')
                            <img src= {{ asset('/images/weather/16.png') }} class="weather" alt="雪">
                            @break
        
                        @default
                            <img src= {{ asset('/images/weather/32.png') }} class="weather" alt="晴れ">
                    @endswitch
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
    @endforeach
@endif


