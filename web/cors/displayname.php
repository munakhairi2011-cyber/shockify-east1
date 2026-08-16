<?php
$display = htmlspecialchars($_GET["display"]);
?>
<h2 ng-non-bindable="" class="profile-name text-overflow">
                            <?php echo $display; ?>
                        </h2>