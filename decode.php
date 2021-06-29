<?php

$apiPrefix = "https://api.vindecoder.eu/3.1";
$apikey = "652dbbbced43";   // Your API key
$secretkey = "a50ce28f9d";  // Your secret key
$id = "info";
$vin = $_GET['vin'];

$controlsum = substr(sha1("{$vin}|{$id}|{$apikey}|{$secretkey}"), 0, 10);

$data = file_get_contents("{$apiPrefix}/{$apikey}/{$controlsum}/decode/info/{$vin}.json", false);

print_r($data);
