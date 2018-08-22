<?php

$from = 'USD';
$to = 'JPY';
$quanity = '1';
$APIKEY = 'QmQydPNf8rV2yTsP1APoX6GdvyKnL9bi';
# $APIKEY = config('const.1FORGE_API_KEY');

$url = 'https://forex.1forge.com/1.0.3/convert' . '?from=' . $from . '&to=' . $to . '&quantity=' . $quanity . '&api_key=' . $APIKEY;
// API残り回数
# $url = "https://forex.1forge.com/1.0.3/quota?api_key=" . $APIKEY;

$json = file_get_contents($url);
$c = json_decode($json, true);

var_dump($c);