@if ($exchange)
<div class="wrape col-sm-4">
    <div class="inner">
        <h1 class="weather category">為替</h1>
        <h3>{{ $exchange["text"] }}</h3>
        <h2>￥{{ $exchange["value"] }}</h2>
    </div>
</div>
@endif