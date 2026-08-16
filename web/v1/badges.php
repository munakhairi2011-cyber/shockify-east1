<?php
if($_GET["id"]){
    $id = htmlspecialchars($_GET["id"]);
    echo file_get_contents("https://badges.roblox.com/v1/users/$id/badges?sortOrder=Desc");
}

?>