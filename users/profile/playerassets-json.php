<?php
if($_GET["assetTypeId"] && $_GET["userId"]){
    $assetTypeId = htmlspecialchars($_GET["assetTypeId"]);
    $userId = htmlspecialchars($_GET["userId"]);
    echo file_get_contents("https://www.roblox.com/users/profile/playerassets-json?assetTypeId=$assetTypeId&userId=$userId");
}
?>