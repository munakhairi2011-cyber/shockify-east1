<?php
include('stub.php');
function request($url){
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	$output = curl_exec($ch);
	curl_close($ch);
	return $output;
}
$username = $_GET['username'];
if(isset($_GET['username'])){
    $useridch = $userIdch = request("https://api.roblox.com/users/get-by-username?username=$username");
    echo $useridch;
}else{
    die();
}

?>