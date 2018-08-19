@if ($news)
<div class="wrapn col-sm-8">
    <div class="inner">
        <h1 class="news category">ニュース</h1>
        @for ($i = 0; $i < 3; $i++)
            <div class="loop">
                @if (isset($news["value"][$i]["image"]["thumbnail"]["contentUrl"]))
                    <img src="{{ $news["value"][$i]["image"]["thumbnail"]["contentUrl"] }}" alt="" role="presentation" class="img_left">
                @else
                    <img src="{{ asset('/images/news/noimg.png') }}" alt="" role="presentation" class="img_left">    
                @endif
                <a href="{{ $news["value"][$i]["url"] }}"><h4 class="newsname">{{ $news["value"][$i]["name"] }}</h4></a>
                <p>{{ $news["value"][$i]["description"] }}</p>
                <div class="clear"></div>
            </div>
        @endfor
    </div>
</div>
@endif
