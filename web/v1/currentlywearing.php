<?php
if($_GET["id"]){
$id = htmlspecialchars($_GET["id"]);
$shit = file_get_contents("https://avatar.roblox.com/v1/users/$id/currently-wearing");
echo $shit;
}
?>