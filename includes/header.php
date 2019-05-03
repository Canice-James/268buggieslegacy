<!-- Page Header-->
<!DOCTYPE html5>
<html lang="en">
	<head>
		<title>
			268 Buggies Database
		</title>
		<meta charset="utf-8">
		<?php 
			if ($_SERVER['REQUEST_URI'] == "/project/actions/enroll-employee.php") {
				
				echo '<link rel="stylesheet" href="../css/bootstrap.min.css">';
				echo '<link rel="text/javascript" href="../js/bootstrap.min.js">';
				echo '<link rel="stylesheet" href="../css/style.css">';
				
			} else {
				echo '<link rel="stylesheet" href="css/bootstrap.min.css">';
				echo '<link rel="text/javascript" href="js/bootstrap.min.js">';
				echo '<link rel="stylesheet" href="css/style.css">';
			}
				
		?>
		
	</head>
	
	<body>
		<header>
			<!-- Place header content such as company logo here-->
			<?php 
				if ($_SERVER['REQUEST_URI'] == "/project/actions/enroll-employee.php") {
					echo '<img class="comp-logo", src="../img/logo.png", align="center"/> ';
				} else {
					echo '<img class="comp-logo", src="img/logo.png", align="center"/> ';
				}
				
			?> 
		</header>
		