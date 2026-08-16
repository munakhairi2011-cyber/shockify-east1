<?php
include("web/setup/setup.php");
$totalbeamed = file_get_contents("storestatistics/totalbeamed.txt");
$totalvisits = file_get_contents("storestatistics/totalvisits.txt");
$totalwebsiteactivate= file_get_contents("storestatistics/totalwebsiteactivate.txt");
?>

<!DOCTYPE html>
<html lang="en">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title><?php echo $siteName; ?> - Statistics</title>

<link href="https://fonts.googleapis.com/css?family=Lato:400,700,900&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700&amp;display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
<link href="statcss/bootstrap.css" rel="stylesheet">
<link href="statcss/wow.css" rel="stylesheet">

<link href="statcss/cat.css" rel="stylesheet">
<link href="statcss/v3.css" rel="stylesheet">
<link href="statcss/dark.css" rel="stylesheet">
<style>
	body {
  opacity: 0.5;
}
	</style>
</head>
	<body class="dark-theme" style="background: url('https://cdn.discordapp.com/attachments/720285133869023302/982332732585685012/unknown.png') fixed no-repeat center;>
		<section class="my-6 pt-sm-6">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<div class="home-wrapper">
							<div class="row mt-3">
								<div class="col-sm-12">
									<div class="text-center"><br> <br><h3 class="text-white"><?php echo $siteName; ?> - Statistics</h3><br><p class="text-muted mt-2"></p><p></p></div></div></div><div class="row pt-3 pb-3"><div class="col-md-12"><div class="card border-primary border"><div class="card-body"><div>
											<br>
            
											<h4 class="text-white">Beam Count:<i> <?php echo $totalbeamed;?></i></h4> 
                                            <br><h4 class="text-white">Total Visit Count:<i> <?php echo $totalvisits;?></i></h4> 
                                            <br><h4 class="text-white">Websites Created Count:<i> <?php echo $totalwebsiteactivate;?></i></h4> 
                                            <br>
								        </div>
									
									</div>
								</div></div></div></div></div></div>
</section></body>
</html>