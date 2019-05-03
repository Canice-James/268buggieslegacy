<!---->

<!--Header section-->
<?php include('includes/header.php');
	
	if (isset($_POST['action']) && $_POST['action'] == 'Reset') {
		unset($_GET['fname_err']);
		unset($_GET['lname_err']);
		unset($_GET['tele_err']);
		unset($_GET['addr_err']);
		unset($_GET['dob_err']);
		unset($_GET['jtitle_err']);
		unset($_GET['hwork_err']);
		unset($_GET['prate_err']);
		unset($_GET['ssn_err']);
		unset($_GET['mbn_err']);
		
		unset($_GET['fname-e']);
		unset($_GET['lname-e']);
		unset($_GET['tele-e']);
		unset($_GET['addr-e']);
		unset($_GET['dob-e']);
		unset($_GET['jtitle-e']);
		unset($_GET['hwork-e']);
		unset($_GET['prate-e']);
		unset($_GET['ssn-e']);
		unset($_GET['mbn-e']);
		
		unset($_GET['fn']);
		unset($_GET['ln']);
		unset($_GET['tele']);
		unset($_GET['addr']);
		unset($_GET['dob']);
		unset($_GET['jtitle']);
		unset($_GET['hwork']);
		unset($_GET['prate']);
		unset($_GET['ssn']);
		unset($_GET['mbn']);
		
		unset($_GET['error']);
		
			
	} else if (isset($_POST['action']) && $_POST['action'] == 'Submit') {
		unset($_GET['fname_err']);
		unset($_GET['lname_err']);
		unset($_GET['tele_err']);
		unset($_GET['addr_err']);
		unset($_GET['dob_err']);
		unset($_GET['jtitle_err']);
		unset($_GET['hwork_err']);
		unset($_GET['prate_err']);
		unset($_GET['ssn_err']);
		unset($_GET['mbn_err']);
		
		unset($_GET['fname-e']);
		unset($_GET['lname-e']);
		unset($_GET['tele-e']);
		unset($_GET['addr-e']);
		unset($_GET['dob-e']);
		unset($_GET['jtitle-e']);
		unset($_GET['hwork-e']);
		unset($_GET['prate-e']);
		unset($_GET['ssn-e']);
		unset($_GET['mbn-e']);
		
		unset($_GET['fn']);
		unset($_GET['ln']);
		unset($_GET['tele']);
		unset($_GET['addr']);
		unset($_GET['dob']);
		unset($_GET['jtitle']);
		unset($_GET['hwork']);
		unset($_GET['prate']);
		unset($_GET['ssn']);
		unset($_GET['mbn']);
		
		unset($_GET['error']);
		
		include('includes/strip-search.php');
			
		define('FIRST_NAME',checkSecurity($_POST['fname']));
		define('LAST_NAME', checkSecurity($_POST['lname']));
		define('TELEPHONE', checkSecurity($_POST['tele']));
		define('ADDRESS', checkSecurity($_POST['addr']));
		define('DATE_OF_BIRTH', checkSecurity($_POST['dob']));
		define('JOB_TITLE', checkSecurity($_POST['jtitle']));
		define('HOURS_WORKED', checkSecurity($_POST['hwork']));
		define('PAY_RATE', checkSecurity($_POST['prate']));
		define('SOCIAL_SECURITY', checkSecurity($_POST['ssn']));
		define('MEDICAL_BENEFIT', checkSecurity($_POST['mbn']));
			
		//echo FIRST_NAME." ".LAST_NAME." ".TELEPHONE." ".ADDRESS." ".DATE_OF_BIRTH." ".JOB_TITLE." ".HOURS_WORKED." ".PAY_RATE." ".SOCIAL_SECURITY." ".MEDICAL_BENEFIT;
		include('includes/validate-employee.php');
		validate(FIRST_NAME, LAST_NAME, TELEPHONE, ADDRESS, DATE_OF_BIRTH, JOB_TITLE, HOURS_WORKED, PAY_RATE, SOCIAL_SECURITY, MEDICAL_BENEFIT);
			
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
							
							if (isset($_GET['tele_err'])) {
								echo "<p class='text text-danger'>".$_GET['tele_err']."</p>";
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
							
							if (isset($_GET['jtitle_err'])) {
								echo "<p class='text text-danger'>".$_GET['jtitle_err']."</p>";
								echo "<hr>";	
							}
							
							if (isset($_GET['hwork_err'])) {
								echo "<p class='text text-danger'>".$_GET['hwork_err']."</p>";
								echo "<hr>";
							}
							
							if (isset($_GET['prate_err'])) {
								echo "<p class='text text-danger'>".$_GET['prate_err']."</p>";
								echo "<hr>";
							}
							
							if (isset($_GET['ssn_err'])) {
								echo "<p class='text text-danger'>".$_GET['ssn_err']."</p>";
								echo "<hr>";
							}
							
							if (isset($_GET['mbn_err'])) {
								echo "<p class='text text-danger'>".$_GET['mbn_err']."</p>";
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
				<input class='form-control' type='text' name='fname' placeholder='Enter Employee First Name...' value="<?php
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
				<input class='form-control' type='text' name='lname' placeholder='Enter Employee Last Name...' value="<?php
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
						if (isset($_GET['tele-e'])) {
							echo "<label for='tele' class='text-danger'>Telephone Number *</label>";
						} else {
							echo "<label for='tele'>Telephone Number</label>";
						}
					?>
					<input class='form-control' type='text' name='tele' placeholder='Enter Employee Telephone...' value="<?php
						if (isset($_GET['tele'])){
							echo $_GET['tele'];
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
					<input class='form-control' type='text' name='addr' placeholder='Enter Employee Address...' value="<?php
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
					<input class='form-control' type='text' name='dob' placeholder='Enter Employee DOB (YYYY-MM-DD)...' value="<?php
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
						if (isset($_GET['jtitle-e'])) {
							echo "<label for='jtitle' class='text-danger'>Job Title *</label>";
						} else {
							echo "<label for='jtitle'>Job Title</label>";
						}
					?>
					<input class='form-control' type='text' name='jtitle' placeholder='Enter Employee Job Title...' value="<?php
						if (isset($_GET['jtitle'])){
							echo $_GET['jtitle'];
						}
					?>"/>
				</div>
				<div class='col-sm'></div>
			</div>
			<div class='row' style='margin-top: 1%;'>
				<div class='col-sm'></div>
				<div class='col-sm'>
					<?php
						if (isset($_GET['hwork-e'])) {
							echo "<label for='hwork' class='text-danger'>Hours Worked (Default 0) *</label>";
						} else {
							echo "<label for='hwork'>Hours Worked (Default 0)</label>";
						}
					?>
					<input class='form-control' type='text' name='hwork' placeholder='Enter Employee Hours Worked...' value="<?php
						if (isset($_GET['hwork'])){
							echo $_GET['hwork'];
						}
					?>"/>
				</div>
				<div class='col-sm'>
					<?php
						if (isset($_GET['prate-e'])) {
							echo "<label for='prate' class='text-danger'>Pay Rate *</label>";
						} else {
							echo "<label for='prate'>Pay Rate</label>";
						}
					?>
					<input class='form-control' type='text' name='prate' placeholder='Enter Employee Pay Rate...' value="<?php
						if (isset($_GET['prate'])){
							echo $_GET['prate'];
						}
					?>"/>
				</div>
				<div class='col-sm'></div>
			</div>
			<div class='row' style='margin-top: 1%;'>
				<div class='col-sm'></div>
				<div class='col-sm'>
					<?php
						if (isset($_GET['ssn-e'])) {
							echo "<label for='ssn' class='text-danger'>Social Security Number (SSN) *</label>";
						} else {
							echo "<label for='ssn'>Social Security Number (SSN)</label>";
						}
					?>
					<input class='form-control' type='text' name='ssn' placeholder='Enter Employee SSN...' value="<?php
						if (isset($_GET['ssn'])){
							echo $_GET['ssn'];
						}
					?>"/>
				</div>
				<div class='col-sm'>
					<?php
						if (isset($_GET['mbn-e'])) {
							echo "<label for='mbn' class='text-danger'>Medical Benefit Number (MBN) *</label>";
						} else {
							echo "<label for='mbn' >Medical Benefit Number (MBN)</label>";
						}
					?>
					<input class='form-control' type='text' name='mbn' placeholder='Enter Employee MBN...' value="<?php
						if (isset($_GET['mbn'])){
							echo $_GET['mbn'];
						}
						
					?>"/>
				</div>
				<div class='col-sm'></div>
			</div>
			<div class='row' style='margin-top: 1%;'>
				<div class='col-sm'></div>
				<div class='col-sm'>
				
					<input class='form-control btn-primary' type='submit' name='action' value='Submit' />
				</div>
				<div class='col-sm'>
					<input class='form-control btn-warning' type='submit' name='action' value='Reset'/>
				</div>
				<div class='col-sm'></div>
			</div>
		</form>
	
</main>


<!--Footer area-->
<?php include('includes/footer.php')?>
