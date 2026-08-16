<?php
if($_GET["id"]){
    $id = htmlspecialchars($_GET["id"]);
    echo file_get_contents("https://friends.roblox.com/v1/users/$id/friends");
}
?>