<?php

$url = 'https://openexchangerates.org/api/latest.json?app_id=c25d3a45c0354f1094280aaa181f8d81' . "&base=USD";
$json = file_get_contents($url);

// var_dump($json);
// die();
# Decode JSON response
$c = json_decode($json, true);
var_dump($c);
