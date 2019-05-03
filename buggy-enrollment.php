<!---->
<!--Header section-->
<?php include('includes/header.php');
	
	if (isset($_POST['action']) && $_POST['action'] == 'Reset') {
		unset($_GET['$colour_err']);
		unset($_GET['run_d_err']);
		unset($_GET['run_c_err']);
		unset($_GET['run_l_err']);
		
		unset($_GET['colour-e']);
		unset($_GET['run_d-e']);
		unset($_GET['run_c-e']);
		unset($_GET['run_l-e']);
		
		unset($_GET['colour']);
		unset($_GET['run_d']);
		unset($_GET['run_c']);
		unset($_GET['run_l']);
		
		unset($_GET['error']);
		
			
	} else if (isset($_POST['action']) && $_POST['action'] == 'Submit') {
		unset($_GET['$colour_err']);
		unset($_GET['run_d_err']);
		unset($_GET['run_c_err']);
		unset($_GET['run_l_err']);
		
		unset($_GET['colour-e']);
		unset($_GET['run_d-e']);
		unset($_GET['run_c-e']);
		unset($_GET['run_l-e']);
		
		unset($_GET['colour']);
		unset($_GET['run_d']);
		unset($_GET['run_c']);
		unset($_GET['run_l']);
		
		unset($_GET['error']);
		
		include('includes/strip-search.php');
			
		define('COLOUR',checkSecurity($_POST['colour']));
		define('RUN_DURATION', checkSecurity($_POST['run_d']));
		define('RUN_COUNT', checkSecurity($_POST['run_c']));
		define('RUNS_LEFT', checkSecurity($_POST['run_l']));
			
		//echo FIRST_NAME." ".LAST_NAME." ".TELEPHONE." ".ADDRESS." ".DATE_OF_BIRTH." ".JOB_TITLE." ".HOURS_WORKED." ".PAY_RATE." ".SOCIAL_SECURITY." ".MEDICAL_BENEFIT;
		include('includes/validate-buggy.php');
		validate(COLOUR, RUN_DURATION, RUN_COUNT, RUNS_LEFT);
			
	} else if (isset($_POST['action']) && $_POST['action'] == 'Go Back') {
		header("Location:buggy-menu.php");
	}
	
?>
	
	
<!--Main area-->
<main>
	<!-- Place the main page content within this area.-->
	<div class="container-fluid">
		<form method='POST'>
			<div class='row'>
				<div class='col-sm'></div>
				<div class='col-6'>
					<?php
						if (isset($_GET['error'])) {
							echo '<div class="alert alert-danger" role="alert">';
							echo '<h5 class="alert-heading">Woah There!</h4>';
							echo '<p>Something went wrong.</p>';
							echo '<hr>';
							
						
							if (isset($_GET['colour_err'])) {
								echo "<p class='text text-danger'>".$_GET['colour_err']."</p>";
								echo "<hr>";
							}
									
							if (isset($_GET['run_d_err'])) {
								echo "<p class='text text-danger'>".$_GET['run_d_err']."</p>";
								echo "<hr>";
							}
							
							if (isset($_GET['run_c_err'])) {
								echo "<p class='text text-danger'>".$_GET['run_c_err']."</p>";
								echo "<hr>";
							}
							
							if (isset($_GET['run_l_err'])) {
								echo "<p class='text text-danger'>".$_GET['run_l_err']."</p>";
								echo "<hr>";
							}
							
							echo "</div>";
						}
				
					?>
				</div>
			<div class='col-sm'></div>
		</div>
		<div class='row'>
			<div class='col-sm'></div>
			<div class='col-sm'>
				<?php
						if (isset($_GET['colour-e'])) {
							echo "<label for='color' class='text-danger'>Color *</label>";
						} else {
							echo "<label for='color'>Color</label>";
						}
					?>
				<input class='form-control' type='text' name='colour' placeholder='Enter Buggy Color...' value="<?php
					if (isset($_GET['colour'])){
						echo $_GET['colour'];
					}
					?>"/>
			</div>
			<div class='col-sm'>
				<?php
						if (isset($_GET['run_d-e'])) {
							echo "<label for='run_d' class='text-danger'>Run Duration *</label>";
						} else {
							echo "<label for='run_d'>Run Duration</label>";
						}
					?>
				<input class='form-control' type='text' name='run_d' placeholder='Enter Run Duration...' value="<?php
					if (isset($_GET['run_d'])){
						echo $_GET['run_d'];
					}
				?>"/>
			</div>
			<div class='col-sm'></div>
		</div>
			<div class='row' style='margin-top: 1%;'>
				<div class='col-sm'></div>
				<div class='col-6'>
					<?php
						if (isset($_GET['run_c-e'])) {
							echo "<label for='run_c' class='text-danger'>Run Count *</label>";
						} else {
							echo "<label for='run_c'>Run Count</label>";
						}
					?>
					<input class='form-control' type='text' name='run_c' placeholder='Enter Run Count...' value="<?php
						if (isset($_GET['run_c'])){
							echo $_GET['run_c'];
						}
					?>"/>
				</div>
				<div class='col-sm'></div>
			</div>
			<div class='row' style='margin-top: 1%;'>
				<div class='col-sm'></div>
				<div class='col-6'>
					<?php
						if (isset($_GET['run_l-e'])) {
							echo "<label for='run_l' class='text-danger'>Runs Left*</label>";
						} else {
							echo "<label for='run_l'>Runs Left</label>";
						}
					?>
					<input class='form-control' type='text' name='run_l' placeholder='Enter Runs Left...' value="<?php
						if (isset($_GET['run_l'])){
							echo $_GET['run_l'];
						}
					?>"/>
				</div>
				<div class='col-sm'></div>
			</div>
			
			<div class='row' style='margin-top: 1%;'>
				<div class='col-sm'></div>
				<div class='col-2'>
					<input class='form-control btn-outline-dark' type='submit' name='action' value='Submit' />
				</div>
				<div class='col-2'>
					<input class='form-control btn-outline-warning' type='submit' name='action' value='Reset'/>
				</div>
				<div class='col-2'>
					<input class='form-control btn-outline-danger' type='submit' name='action' value='Go Back'/>
				</div>
				<div class='col-sm'></div>
			</div>
		</form>
	
</main>


<!--Footer area-->
<?php include('includes/footer.php')?>
