<?php
if($_GET["universeIds"]){
$universeIds = htmlspecialchars($_GET["universeIds"]);
    echo file_get_contents("https://games.roblox.com/v1/games/multiget-playability-status?universeIds=$universeIds");
}
?>