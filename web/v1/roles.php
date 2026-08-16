<?php
$userid = $_GET["id"];
echo file_get_contents("https://groups.roblox.com/v1/users/$userid/groups/roles");

?>