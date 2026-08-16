<?php
if($_GET["gameSortsContext"]){
$gameSortsContext = htmlspecialchars($_GET["gameSortsContext"]);
$shit = file_get_contents("https://games.roblox.com/v1/games/sorts?gameSortsContext=$gameSortsContext");
echo $shit;
}
?>