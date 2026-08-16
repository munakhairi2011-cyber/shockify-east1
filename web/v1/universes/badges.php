<?php
$gameid = htmlspecialchars($_GET["gameid"]);
if($_GET["gameid"]){
    echo file_get_contents("https://badges.roblox.com/v1/universes/$gameid/badges");
}
?>