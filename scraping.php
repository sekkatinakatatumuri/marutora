<?php

$url = "https://info.finance.yahoo.co.jp/fx/convert/";

$dom = new DOMDocument;
$dom->preserveWhiteSpace = false;
$dom->formatOutput = true;
@$dom->loadHTMLFile($url);
$xpath = new DOMXPath($dom);

//件数の取得
$tests2 = $xpath->query('//*[@id="main"]/div[1]/table/tbody/tr[2]/td[4]')->item(0)->nodeValue;

var_dump($tests2);
echo $tests2;