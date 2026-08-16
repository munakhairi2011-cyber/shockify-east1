<?php
$joindate = htmlspecialchars($_GET["joindate"]);
$placevisits = htmlspecialchars($_GET["placevisits"]);
?>
<div class="section profile-statistics">
						<div class="container-header">
							<h3>Statistics</h3></div>
						<div class="section-content">
							<ul class="profile-stats-container">
								<li class="profile-stat">
									<p class="text-label">Join Date</p>
									<p class="text-lead"><?php echo $joindate; ?></p>
								</li>
								<li class="profile-stat">
									<p class="text-label">Place Visits</p>
									<p class="text-lead"><?php echo $placevisits; ?></p>
								</li>
							</ul>
						</div>
					</div>