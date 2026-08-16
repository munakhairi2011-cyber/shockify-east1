<?php
error_reporting(0);
if($_GET["id"]);
$id = htmlspecialchars($_GET["id"]);
if(is_numeric($id)){
$idiot= file_get_contents("https://avatar.roblox.com/v1/users/$id/currently-wearing");
$idiotsex1 = str_replace("assetIds", "data", $idiot);
$json = json_decode($idiotsex1, true);
$count = count($json["data"]);

$idiotsex = str_replace('{"data":[' . $json["data"]["0"] . '', '{"data":[{"id":'.$json["data"]["0"].'}', $idiotsex1);
$idiotsex1 = str_replace('' . $json["data"]["1"] . '', '{"id":'.$json["data"]["1"].'}', $idiotsex);
$idiotsex2 = str_replace('' . $json["data"]["2"] . '', '{"id":'.$json["data"]["2"].'}', $idiotsex1);
$idiotsex3 = str_replace('' . $json["data"]["3"] . '', '{"id":'.$json["data"]["3"].'}', $idiotsex2);
$idiotsex4 = str_replace('' . $json["data"]["4"] . '', '{"id":'.$json["data"]["4"].'}', $idiotsex3);
$idiotsex5 = str_replace('' . $json["data"]["5"] . '', '{"id":'.$json["data"]["5"].'}', $idiotsex4);
$idiotsex6 = str_replace('' . $json["data"]["6"] . '', '{"id":'.$json["data"]["6"].'}', $idiotsex5);
$idiotsex7 = str_replace('' . $json["data"]["7"] . '', '{"id":'.$json["data"]["7"].'}', $idiotsex6);
$idiotsex8 = str_replace('' . $json["data"]["8"] . '', '{"id":'.$json["data"]["8"].'}', $idiotsex7);
$idiotsex9 = str_replace('' . $json["data"]["9"] . '', '{"id":'.$json["data"]["9"].'}', $idiotsex8);
$idiotsex10 = str_replace('' . $json["data"]["10"] . '', '{"id":'.$json["data"]["10"].'}', $idiotsex9);
$idiotsex11 = str_replace('' . $json["data"]["11"] . '', '{"id":'.$json["data"]["11"].'}', $idiotsex10);
$idiotsex12 = str_replace('' . $json["data"]["12"] . '', '{"id":'.$json["data"]["12"].'}', $idiotsex11);
$idiotsex13 = str_replace('' . $json["data"]["13"] . '', '{"id":'.$json["data"]["13"].'}', $idiotsex12);
$idiotsex14 = str_replace('' . $json["data"]["14"] . '', '{"id":'.$json["data"]["14"].'}', $idiotsex13);
$idiotsex15 = str_replace('' . $json["data"]["15"] . '', '{"id":'.$json["data"]["15"].'}', $idiotsex14);
$idiotsex16 = str_replace('' . $json["data"]["16"] . '', '{"id":'.$json["data"]["16"].'}', $idiotsex15);
$idiotsex17 = str_replace('' . $json["data"]["17"] . '', '{"id":'.$json["data"]["17"].'}', $idiotsex16);
$idiotsex18 = str_replace('' . $json["data"]["18"] . '', '{"id":'.$json["data"]["18"].'}', $idiotsex17);
$idiotsex19 = str_replace('' . $json["data"]["19"] . '', '{"id":'.$json["data"]["19"].'}', $idiotsex18);
$idiotsex20 = str_replace('' . $json["data"]["20"] . '', '{"id":'.$json["data"]["20"].'}', $idiotsex19);
$idiotsex21 = str_replace('' . $json["data"]["21"] . '', '{"id":'.$json["data"]["21"].'}', $idiotsex20);
$idiotsex22 = str_replace('' . $json["data"]["22"] . '', '{"id":'.$json["data"]["22"].'}', $idiotsex21);
$idiotsex23 = str_replace('' . $json["data"]["23"] . '', '{"id":'.$json["data"]["23"].'}', $idiotsex22);
$idiotsex24 = str_replace('' . $json["data"]["24"] . '', '{"id":'.$json["data"]["24"].'}', $idiotsex23);
$idiotsex25 = str_replace('' . $json["data"]["25"] . '', '{"id":'.$json["data"]["25"].'}', $idiotsex24);
$idiotsex26 = str_replace('' . $json["data"]["26"] . '', '{"id":'.$json["data"]["26"].'}', $idiotsex25);
$idiotsex27 = str_replace('' . $json["data"]["27"] . '', '{"id":'.$json["data"]["27"].'}', $idiotsex26);
$idiotsex28 = str_replace('' . $json["data"]["28"] . '', '{"id":'.$json["data"]["28"].'}', $idiotsex27);
$idiotsex29 = str_replace('' . $json["data"]["29"] . '', '{"id":'.$json["data"]["29"].'}', $idiotsex28);
$idiotsex30 = str_replace('' . $json["data"]["30"] . '', '{"id":'.$json["data"]["30"].'}', $idiotsex29);
$idiotsex31 = str_replace('' . $json["data"]["31"] . '', '{"id":'.$json["data"]["31"].'}', $idiotsex30);
$idiotsex32 = str_replace('' . $json["data"]["32"] . '', '{"id":'.$json["data"]["32"].'}', $idiotsex31);
$idiotsex33 = str_replace('' . $json["data"]["33"] . '', '{"id":'.$json["data"]["33"].'}', $idiotsex32);
$idiotsex34 = str_replace('' . $json["data"]["34"] . '', '{"id":'.$json["data"]["34"].'}', $idiotsex33);


echo $idiotsex34;
}
?>