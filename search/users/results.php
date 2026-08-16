<?php
$keyword = htmlspecialchars($_GET["keyword"]);
$keyword = str_replace(" ", "%20", $keyword);
$maxRows = htmlspecialchars($_GET["maxRows"]);
$startIndex = htmlspecialchars($_GET["startIndex"]);
if($_GET["keyword"]){
    echo file_get_contents("https://www.roblox.com/search/users/results?keyword=$keyword&maxRows=$maxRows&startIndex=$startIndex");
}
?>