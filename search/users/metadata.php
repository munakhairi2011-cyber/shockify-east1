<?php
$keyword = htmlspecialchars($_GET["keyword"]);
$keyword = str_replace(" ", "%20", $keyword);
$api = file_get_contents("https://www.roblox.com/search/users/metadata?keyword=$keyword");
echo $api;
?>