<!-- validate-employee.php-->
<?php

	function validate($fname, $lname, $tele, $addr, $dob, $jtitle, $hwork, $prate, $ssn, $mbn) {
		$invalid = FALSE;
		if(!preg_match("/^[a-zA-Z]+$/", $fname) == TRUE){
			$fname_err =  "*First name shouldn't be blank or have numbers or symbols.";
			$invalid = TRUE;
		}
		
		if(!preg_match("/^[a-zA-Z]+$/", $lname) == TRUE) {
			$lname_err =  "* Last name not valid.";
			$invalid = TRUE;
		}
		
		if(!preg_match("/^[1]{1}-[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $tele) == TRUE) {
 			$tele_err = "* TELEPHONE FORMAT 1-111-111-1111.";
 			$invalid = TRUE;
		}

		if (empty($addr) || !preg_match("/^[a-zA-Z0-9- ]+$/i", $addr) == TRUE) {
			$addr_err = "* Address must not be blank or contain quotation marks.";
			$invalid = TRUE;
		}
		
		if (empty($dob) || !preg_match("/^[0-9]{4}-(0[1-9]|1[0-2])-(0[1-9]|[1-2][0-9]|3[0-1])$/", $dob) == TRUE) {
			$dob_err = "* DOB FORMAT YYYY-MM-DD.";
			$invalid = TRUE;
		}
		
		if(!preg_match("/^[a-zA-Z]+$/", $jtitle) == TRUE) {
			$jtitle_err =  "* We must know the employee job title.";
			$invalid = TRUE;
		}
		
		if(!preg_match("/^[0-9]+$/", $hwork) == TRUE) {
			$hwork_err =  "* Identify hours worked. DEFAULT 0.";
			$invalid = TRUE;
		}
		
		if(!preg_match("/^[0-9]+$/", $prate) == TRUE) {
			$prate_err =  "* Enter Valid Pay rate.";
			$invalid = TRUE;
		}
		
		if(!preg_match("/^[0-9]{6}-[0-9]{1}-[0-9]{6}-[A-Z]{2}-[0-9]{1}+$/", $ssn) == TRUE) {
			$ssn_err =  "*FORMAT SSN USING SYNTAX -> 123456-1-123456-AB-1.";
			$invalid = TRUE;
		}
		
		if(!preg_match("/^[0-9]{7}[A-Z]{2}+$/", $mbn) == TRUE) {
			$mbn_err =  "*FORMAT MBN SYNTAX -> 1234567AB.";
			$invalid = TRUE;
		}
		
		
		if ($invalid) {
			//echo "<div style='background-color: orange; color: black; border-radius: 3px; border: 1px solid black; width: 45%; margin: auto auto;'";
			//echo '<div style="width:40%;margin-top:5%; margin-left: auto; margin-right: auto;"><div class="alert alert-danger">';
			//echo '<h1 class="text-danger">Employee Entry</h1>';
			//echo '<p class="text-danger">There are errors in your employee entry.</p>';
			//echo "<br>";

			$link = "employee-enrollment.php?error=true&";

			if (!empty($fname_err)) {
				//echo "<p class='text-danger'>".$fname_err."</p><hr>";
				$link .= "fname_err=$fname_err&fname-e=true";

			}

			if (!empty($lname_err)) {
				if (!empty($fname_err)) {
					$link .= "&";
				}
				//echo "<p class='text-danger'>".$lname_err."</p><hr>";
				$link .= "lname_err=$lname_err&lname-e=true";
			}
			
			if (!empty($tele_err)) {
				if (!empty($fname_err) || !empty($lname_err)) {
					$link .= "&";
				}
				//echo "<p class='text-danger'>".$tele_err."</p><hr>";
				$link .= "tele_err=$tele_err&tele-e=true";
			}
			
			if (!empty($addr_err)) {
				if (!empty($fname_err) || !empty($lname_err) || !empty($tele_err)) {
					$link .= "&";
				}
				//echo "<p class='text text-danger'>".$addr_err."</p><hr>";
				$link .= "addr_err=$addr_err&addr-e=true";
			}

			if (!empty($dob_err)) {
				if (!empty($fname_err) || !empty($lname_err) || !empty($tele_err) || !empty($addr_err)) {
					$link .= "&";
				}
				//echo "<p class='text text-danger'>".$dob_err."</p><hr>";
				$link .= "dob_err=$dob_err&dob-e=true";
			}
			
			if (!empty($jtitle_err)) {
				if (!empty($fname_err) || !empty($lname_err) || !empty($tele_err) || !empty($addr_err) || !empty($dob_err)) {
					$link .= "&";
				}
				//echo "<p class='text text-danger'>".$jtitle_err."</p><hr>";
				$link .= "jtitle_err=$jtitle_err&jtitle-e=true";
			}
			
			if (!empty($hwork_err)) {
				if (!empty($fname_err) || !empty($lname_err) || !empty($tele_err) || !empty($addr_err) || !empty($dob_err) || !empty($jtitle_err)) {
					$link .= "&";
				}
				//echo "<p class='text text-danger'>".$hwork_err."<hr></p>";
				$link .= "hwork_err=$hwork_err&hwork-e=true";
			}
			
			if (!empty($prate_err)) {
				if (!empty($fname_err) || !empty($lname_err) || !empty($tele_err) || !empty($addr_err) || !empty($dob_err) || !empty($jtitle_err) || !empty($hwork_err)) {
					$link .= "&";
				}
				//echo "<p class='text text-danger'>".$prate_err."</p><hr>";
				$link .= "prate_err=$prate_err&prate-e=true";
			}
			
			if (!empty($ssn_err)) {
				if (!empty($fname_err) || !empty($lname_err) || !empty($tele_err) || !empty($addr_err) || !empty($dob_err) || !empty($jtitle_err) || !empty($hwork_err) || !empty($prate_err)) {
					$link .= "&";
				}
				//echo "<p class='text text-danger'>".$ssn_err."</p><hr>";
				$link .= "ssn_err=$ssn_err&ssn-e=true";
			}
			
			if (!empty($mbn_err)) {
				if (!empty($fname_err) || !empty($lname_err) || !empty($tele_err) || !empty($addr_err) || !empty($dob_err) || !empty($jtitle_err) || !empty($hwork_err) || !empty($prate_err) || !empty($ssn_err)) {
					$link .= "&";
				}
				//echo "<p class='text text-danger'>".$mbn_err."</p>";
				$link .= "mbn_err=$mbn_err&mbn-e=true";
			}
			$link .= "&fn=$fname&ln=$lname&addr=$addr&tele=$tele&dob=$dob&jtitle=$jtitle&hwork=$hwork&prate=$prate&ssn=$ssn&mbn=$mbn";
			
			//echo "<br>";
			//echo "<a href='$link' class='btn btn-danger'>Fix Errors</a>";
			//echo "</div></div>";
			header("Location:$link");
			return;

		} else {

			//get the config file
			require('config.php');
			//write the query to get the data from the customer table
    		
			
			$sql = "SELECT count(*) as total FROM employee";
			
    		//run the query and store it in result
    		$result = $conn->query($sql);
			
			
			
    		//if the number of rows in result is greater than 0
			
    		if ($result->num_rows > 0) {
				$id = 0;
				while ($row = $result->fetch_assoc()) {
					
					if ($row['total'] == 0)  {
						
						$id = 0;
					
					} else {

						$id = $row['total'];
					
					}
					
				}
				$sql_insert = "INSERT INTO employee VALUES (?,?,?,?,?,?,?,?,?,?,?);";
				$stmt = $conn->prepare($sql_insert);
				$stmt->bind_param("issssssssss", $id ,$fname, $lname, $tele, $addr, $dob, $jtitle, $hwork, $prate, $ssn, $mbn);
				echo $fname."<br>";
				echo $lname."<br>";
				echo $addr."<br>";
				echo $tele."<br>";
				echo ""."<br>";
				if ($stmt->execute()) {
					header("Location:employee-menu.php?id=$id");
				} else {
					echo $stmt->error;
				} 	

			}
		}
	}
include('footer.php');
?>