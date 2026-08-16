<style>
    .disclaimer{display:none}
</style>
<?php
include("../includes/functions.php");
if(isset($_GET['id'])){
	echo requestSponsorship($_GET['id']);
}
?>