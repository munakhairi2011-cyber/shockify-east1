<?php

$content=file_get_contents("https://www.roblox.com");
function getcsrf($ass)
{
    preg_match('/(?<=meta name="csrf-token" data-token=")(.*?)(?=")/', $ass, $result);
    return $result[0];
}
$csrf = getcsrf($content);
$request_body = file_get_contents('php://input');
$ch = curl_init();
    
curl_setopt($ch, CURLOPT_URL, 'https://catalog.roblox.com/v1/catalog/items/details');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS, ''.$request_body.''
);

$headers = array();
$headers[] = 'Content-Type: application/json';
$headers[] = 'Accept: application/json';
 $headers[] =   'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36';
$headers[] =    'Referer: https://www.roblox.com/';
   $headers[] = 'Origin: https://www.roblox.com';
   $headers[] = 'X-CSRF-TOKEN: '.$csrf.'';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result = curl_exec($ch);
echo $result;
?>