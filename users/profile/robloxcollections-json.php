<?php
if($_GET["userId"]){
    $userId = htmlspecialchars($_GET["userId"]);
    echo file_get_contents("https://www.roblox.com/users/profile/robloxcollections-json?userId=$userId");
}
?>