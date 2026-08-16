<?php
error_reporting(0);
$keyword = htmlspecialchars($_GET["keyword"]);
$keyword = str_replace(" ", "%20", $keyword);
$limit = htmlspecialchars($_GET["limit"]);
$prioritizeExactMatch = htmlspecialchars($_GET["prioritizeExactMatch"]);
$sortOrder = htmlspecialchars($_GET["sortOrder"]);
$shit = file_get_contents("https://groups.roblox.com/v1/groups/search?cursor=&keyword=$keyword&limit=$limit&prioritizeExactMatch=$prioritizeExactMatch&sortOrder=$sortOrder");
echo $shit;
?>