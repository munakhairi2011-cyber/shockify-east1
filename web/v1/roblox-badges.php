<?php
if($_GET["id"]){
    $id = htmlspecialchars($_GET["id"]);
$shit = file_get_contents("https://accountinformation.roblox.com/v1/users/$id/roblox-badges");
echo $shit;
}
?>