<?php
$session = htmlspecialchars($_GET["session"]);
?>
<script>
function redirect() {
    document.location.href = "/login?session=<?php echo $session; ?>"
}

setTimeout(function(){
    var loginshit = document.getElementsByClassName("login-action")[0]
loginshit.innerHTML = `<li class="login-action"><a class="rbx-navbar-login btn-secondary-sm nav-menu-title rbx-menu-item" onclick="redirect()">Log In</a></li>`;
},500)
</script>