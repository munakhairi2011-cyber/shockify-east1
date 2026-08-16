<?php
if($_GET["gameid"]){
    $gameid = htmlspecialchars($_GET["gameid"]);
    echo file_get_contents("https://games.roblox.com/v2/games/$gameid/media");
}
?>