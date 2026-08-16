<?php
if($_GET["PlaceId"]){
    $placeId = htmlspecialchars($_GET["PlaceId"]);
    if(is_numeric($placeId)){
        $url2 = "https://www.roblox.com/places/api-get-details?assetId=$placeId";

        $curl2 = curl_init($url2);
        curl_setopt($curl2, CURLOPT_URL, $url2);
        curl_setopt($curl2, CURLOPT_RETURNTRANSFER, true);
    
        //for debug only!
        curl_setopt($curl2, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($curl2, CURLOPT_SSL_VERIFYPEER, false);
    
        $resp2 = curl_exec($curl2);
        $info = json_decode($resp2);
    
        $gname = $info->Name;
          
        // Given string
        $str = $gname; 
        $gamename = $gname;
        $namegame = str_replace(' ', '-', $gamename);
        $gamename2 = preg_replace('/([0-9|#][\x{20E3}])|[\x{00ae}|\x{00a9}|\x{203C}|\x{2047}|\x{2048}|\x{2049}|\x{3030}|\x{303D}|\x{2139}|\x{2122}|\x{3297}|\x{3299}][\x{FE00}-\x{FEFF}]?|[\x{2190}-\x{21FF}][\x{FE00}-\x{FEFF}]?|[\x{2300}-\x{23FF}][\x{FE00}-\x{FEFF}]?|[\x{2460}-\x{24FF}][\x{FE00}-\x{FEFF}]?|[\x{25A0}-\x{25FF}][\x{FE00}-\x{FEFF}]?|[\x{2600}-\x{27BF}][\x{FE00}-\x{FEFF}]?|[\x{2900}-\x{297F}][\x{FE00}-\x{FEFF}]?|[\x{2B00}-\x{2BF0}][\x{FE00}-\x{FEFF}]?|[\x{1F000}-\x{1F6FF}][\x{FE00}-\x{FEFF}]?/u', '', $namegame);
        $gamename3 = str_replace("+", "", $gamename2);
        $gamename4 = str_replace(":", "", $gamename3);
        $gamename5 = str_replace(".", "", $gamename4);
        header("Location: $placeId/$gamename5");


}
}
?>