<!DOCTYPE html5>
	<body>

		<!--Header section-->
		<?php include('includes/header.php');?>
	
		<!--Main area-->
		<main>
		<!-- Place the main page content within this area.-->
			<div class="container-fluid">
				<div class='row'>
	
					<div class='col'></div>
				
					<div class='col'>
						<div class='card card-body'>
							<h4 class='card-title'>Login</h2>
							<?php 
								if (isset($_GET['error'])) {
									echo '<div class="alert alert-danger" role="alert">';
									echo '<h5 class="alert-heading">Woah There!</h4>';
									echo '<p>Something went wrong.</p>';
									echo '<hr>';
									echo '<p class="mb-0">Check your username & password.</p>';
									echo '</div>';
								}
							?>
							<form action='admin-dash.php' method='POST'>
								<input class='form-control' type='text' name='username' placeholder='Enter username...'/><br>
								<input class='form-control' type='password' name ='password' placeholder='Enter password...'/><br>
								<input class='btn-primary form-control' type='submit' name='Submit' value='Submit'/>
							</form>
						</div>
					</div>
				
					<div class='col'></div>
				</div>
			
			</div>
		</main>

<!--Footer area-->
<?php include('includes/footer.php');?>
