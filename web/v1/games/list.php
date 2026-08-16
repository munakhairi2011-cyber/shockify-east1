<?php
error_reporting(0);
if($_GET["sortToken"]){
    $sortToken = htmlspecialchars($_GET["sortToken"]);
    $gameSetTargetId = htmlspecialchars($_GET["gameSetTargetId"]);
    $startRows = htmlspecialchars($_GET["startRows"]);
    $maxRows = htmlspecialchars($_GET["maxRows"]);
    $hasMoreRows = htmlspecialchars($_GET["hasMoreRows"]);
    $sortPosition = htmlspecialchars($_GET["sortPosition"]);
    $pageContextpageId = htmlspecialchars($_GET["pageContext.PageId"]);
    echo file_get_contents("https://games.roblox.com/v1/games/list?sortToken=$sortToken&gameSetTargetId=$gameSetTargetId&startRows=$startRows&maxRows=$maxRows&hasMoreRows=$hasMoreRows&sortPosition=$sortPosition&pageContext.pageId=$pageContextpageId");
}elseif($_GET["keyword"]){

$keyword1 = htmlspecialchars($_GET["keyword"]);
$keyword = str_replace(" ", "%20", $keyword1);
$startRows = htmlspecialchars($_GET["startRows"]);
$maxRows = htmlspecialchars($_GET["maxRows"]);
$isKeywordSuggestionEnabled = htmlspecialchars($_GET["isKeywordSuggestionEnabled"]);
echo file_get_contents("https://games.roblox.com/v1/games/list?keyword=$keyword&startRows=$startRows&maxRows=$maxRows&isKeywordSuggestionEnabled=$isKeywordSuggestionEnabled");
}
?>