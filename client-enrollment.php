<!---->
<!--Header section-->
<?php include('includes/header.php');
	
	if (isset($_POST['action']) && $_POST['action'] == 'Reset') {
		unset($_GET['fname_err']);
		unset($_GET['lname_err']);
		unset($_GET['addr_err']);
		unset($_GET['dob_err']);
		unset($_GET['tele_err']);
		unset($_GET['e-name_err']);
		unset($_GET['e-num_err']);
		unset($_GET['type_err']);
		
		unset($_GET['fname-e']);
		unset($_GET['lname-e']);
		unset($_GET['addr-e']);
		unset($_GET['dob-e']);
		unset($_GET['tele-e']);
		unset($_GET['e-name-e']);
		unset($_GET['e-num-e']);
		unset($_GET['type-e']);
		
		unset($_GET['fn']);
		unset($_GET['ln']);
		unset($_GET['addr']);
		unset($_GET['dob']);
		unset($_GET['tele']);
		unset($_GET['e-name']);
		unset($_GET['e-num']);
		unset($_GET['type']);
		
		unset($_GET['error']);
		
			
	} else if (isset($_POST['action']) && $_POST['action'] == 'Submit') {
		unset($_GET['fname_err']);
		unset($_GET['lname_err']);
		unset($_GET['addr_err']);
		unset($_GET['dob_err']);
		unset($_GET['tele_err']);
		unset($_GET['e_name_err']);
		unset($_GET['e_num_err']);
		unset($_GET['type_err']);
		
		unset($_GET['fname-e']);
		unset($_GET['lname-e']);
		unset($_GET['addr-e']);
		unset($_GET['dob-e']);
		unset($_GET['tele-e']);
		unset($_GET['e_name-e']);
		unset($_GET['e_num-e']);
		unset($_GET['type-e']);
		
		unset($_GET['fn']);
		unset($_GET['ln']);
		unset($_GET['addr']);
		unset($_GET['dob']);
		unset($_GET['tele']);
		unset($_GET['e_name']);
		unset($_GET['e_num']);
		unset($_GET['type']);
		
		unset($_GET['error']);
		
		include('includes/strip-search.php');
			
		define('FIRST_NAME',checkSecurity($_POST['fname']));
		define('LAST_NAME', checkSecurity($_POST['lname']));
		define('ADDRESS', checkSecurity($_POST['addr']));
		define('DATE_OF_BIRTH', checkSecurity($_POST['dob']));
		define('TELEPHONE', checkSecurity($_POST['tele']));
		define('EMERGENCY_CONTACT_NAME', checkSecurity($_POST['e_name']));
		define('EMERGENCY_CONTACT_NUMBER', checkSecurity($_POST['e_num']));
		define('TYPE', checkSecurity($_POST['type']));
		//echo FIRST_NAME." ".LAST_NAME." ".TELEPHONE." ".ADDRESS." ".DATE_OF_BIRTH." ".JOB_TITLE." ".HOURS_WORKED." ".PAY_RATE." ".SOCIAL_SECURITY." ".MEDICAL_BENEFIT;
		include('includes/validate-client.php');
		validate(FIRST_NAME, LAST_NAME, ADDRESS, DATE_OF_BIRTH, TELEPHONE, EMERGENCY_CONTACT_NAME, EMERGENCY_CONTACT_NUMBER, TYPE);
			
	} else if (isset($_POST['action']) && $_POST['action'] == 'Go Back') {
		header("Location:client-menu.php");
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
							
						
							if (isset($_GET['fname_err'])) {
								echo "<p class='text text-danger'>".$_GET['fname_err']."</p>";
								echo "<hr>";
							}
									
							if (isset($_GET['lname_err'])) {
								echo "<p class='text text-danger'>".$_GET['lname_err']."</p>";
								echo "<hr>";
							}
							
							if (isset($_GET['addr_err'])) {
								echo "<p class='text text-danger'>".$_GET['addr_err']."</p>";
								echo "<hr>";
							}
							
							if (isset($_GET['dob_err'])) {
								echo "<p class='text text-danger'>".$_GET['dob_err']."</p>";
								echo "<hr>";
							}
							
							if (isset($_GET['tele_err'])) {
								echo "<p class='text text-danger'>".$_GET['tele_err']."</p>";
								echo "<hr>";
							}
							
							if (isset($_GET['e_name_err'])) {
								echo "<p class='text text-danger'>".$_GET['e_name_err']."</p>";
								echo "<hr>";	
							}
							
							if (isset($_GET['e_num_err'])) {
								echo "<p class='text text-danger'>".$_GET['e_num_err']."</p>";
								echo "<hr>";
							}
							
							if (isset($_GET['type_err'])) {
								echo "<p class='text text-danger'>".$_GET['type_err']."</p>";
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
						if (isset($_GET['fname-e'])) {
							echo "<label for='fname' class='text-danger'>First Name *</label>";
						} else {
							echo "<label for='fname'>First Name</label>";
						}
					?>
				<input class='form-control' type='text' name='fname' placeholder='Enter Client First Name...' value="<?php
					if (isset($_GET['fn'])){
						echo $_GET['fn'];
					}
					?>"/>
			</div>
			<div class='col-sm'>
				<?php
						if (isset($_GET['lname-e'])) {
							echo "<label for='lname' class='text-danger'>Last Name *</label>";
						} else {
							echo "<label for='lname'>Last Name</label>";
						}
					?>
				<input class='form-control' type='text' name='lname' placeholder='Enter Client Last Name...' value="<?php
					if (isset($_GET['ln'])){
						echo $_GET['ln'];
					}
				?>"/>
			</div>
			<div class='col-sm'></div>
		</div>
			<div class='row' style='margin-top: 1%;'>
				<div class='col-sm'></div>
				<div class='col-6'>
					<?php
						if (isset($_GET['addr-e'])) {
							echo "<label for='addr' class='text-danger'>Address *</label>";
						} else {
							echo "<label for='addr'>Address</label>";
						}
					?>
					<input class='form-control' type='text' name='addr' placeholder='Enter Client Address...' value="<?php
						if (isset($_GET['addr'])){
							echo $_GET['addr'];
						}
					?>"/>
				</div>
				<div class='col-sm'></div>
			</div>
			<div class='row' style='margin-top: 1%;'>
				<div class='col-sm'></div>
				<div class='col-6'>
					<?php
						if (isset($_GET['dob-e'])) {
							echo "<label for='dob' class='text-danger'>Date of Birth *</label>";
						} else {
							echo "<label for='dob'>Date of Birth</label>";
						}
					?>
					<input class='form-control' type='text' name='dob' placeholder='Enter Client Date of Birth(YYYY-MM-DD)...' value="<?php
						if (isset($_GET['dob'])){
							echo $_GET['dob'];
						}
					?>"/>
				</div>
				<div class='col-sm'></div>
			</div>
			<div class='row' style='margin-top: 1%;'>
				<div class='col-sm'></div>
				<div class='col-6'>
					<?php
						if (isset($_GET['tele-e'])) {
							echo "<label for='tele' class='text-danger'>Telephone *</label>";
						} else {
							echo "<label for='tele'>Telephone</label>";
						}
					?>
					<input class='form-control' type='text' name='tele' placeholder='Enter Client Telephone 1-268-999-9999...' value="<?php
						if (isset($_GET['tele'])){
							echo $_GET['tele'];
						}
					?>"/>
				</div>
				<div class='col-sm'></div>
			</div>
			
			<div class='row' style='margin-top: 1%;'>
				<div class='col-sm'></div>
				<div class='col-2'>
					<?php
						if (isset($_GET['e_name-e'])) {
							echo "<label for='e_name' class='text-danger'>Emergency Contact Name *</label>";
						} else {
							echo "<label for='e_name'>Emergency Contact Name</label>";
						}
					?>
					<input class='form-control' type='text' name='e_name' placeholder='Enter Contact Name...' value="<?php
						if (isset($_GET['e_name'])){
							echo $_GET['e_name'];
						}
					?>"/>
				</div>
				<div class='col-4'>
					<?php
						if (isset($_GET['e_num-e'])) {
							echo "<label for='e_num' class='text-danger'>Emergency Contact Number *</label>";
						} else {
							echo "<label for=e_num'>Emergency Contact Number</label>";
						}
					?>
					<input class='form-control' type='text' name='e_num' placeholder='Enter Contact Number 1-268-777-9999...' value="<?php
						if (isset($_GET['e_num'])){
							echo $_GET['e_num'];
						}
					?>"/>
				</div>
				<div class='col-sm'></div>
			</div>
			<div class='row' style='margin-top: 1%;'>
				<div class='col-sm'></div>
				<div class='col-6'>
					<?php
						if (isset($_GET['type-e'])) {
							echo "<label for='type' class='text-danger'>Type *</label>";
						} else {
							echo "<label for='type'>Type</label>";
						}
					?>
					<input class='form form-control' type='text' name='type' placeholder='Enter Client Type...' value="<?php
						if (isset($_GET['type'])){
							echo $_GET['type'];
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
