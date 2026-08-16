<?php
if($_GET["id"] == "undefined/subscriptions"){
    echo '{"errors":[{"code":0,"message":"Authorization has been denied for this request."}]}';
}else{
    $id= htmlspecialchars($_GET["id"]);
    echo file_get_contents("https://users.roblox.com/v1/users/$id");
}
?>