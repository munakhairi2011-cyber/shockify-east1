<?php
error_reporting(0);
if($_GET["category"] && $_GET["limit"]){
    $limit = htmlspecialchars($_GET["limit"]);
    $category = htmlspecialchars($_GET["category"]);
    $sortType = htmlspecialchars($_GET["sortType"]);
    $subcategory = htmlspecialchars($_GET["subcategory"]);
    echo file_get_contents("https://catalog.roblox.com/v1/search/items?category=$category&limit=$limit&sortType=$sortType&subcategory=$subcategory");
}elseif($_GET["keyword"]){
    $category = htmlspecialchars($_GET["category"]);
    $keyword = htmlspecialchars($_GET["keyword"]);
    $limit = htmlspecialchars($_GET["limit"]);
    echo file_get_contents("https://catalog.roblox.com/v1/search/items?category=$category&keyword=$keyword&limit=$limit");
}
?>