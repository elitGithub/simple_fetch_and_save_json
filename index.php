<?php

require_once 'CurlHelper.php';
require_once 'JsonReader.php';


$curlHelper = new CurlHelper();
$jsonReader = new JsonReader();
$url = $_REQUEST['url'];
$fileName = $_REQUEST['fileName'];

$res = $curlHelper::curl_request($url);

file_put_contents("$fileName.json", $res);
echo 'Done!';




