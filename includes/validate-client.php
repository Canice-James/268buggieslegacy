<!---->
<!-- validate-client.php-->
<?php

	function validate($fname, $lname, $addr, $dob, $tele, $e_name, $e_num, $type) {
		$invalid = FALSE;
		if(!preg_match("/^[a-zA-Z]+$/", $fname) == TRUE){
			$fname_err =  "* First name shouldn't be blank or have numbers or symbols.";
			$invalid = TRUE;
		}
		
		if(!preg_match("/^[a-zA-Z]+$/", $lname) == TRUE) {
			$lname_err =  "* Last name shouldn't be blank or have numbers or symbols.";
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
		
		if(!preg_match("/^[1]{1}-[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $tele) == TRUE) {
 			$tele_err = "* TELEPHONE FORMAT 1-111-111-1111.";
 			$invalid = TRUE;
		}

		
		
		if(!preg_match("/^[a-zA-Z ]+$/", $e_name) == TRUE){
			$e_name_err =  "* Emergency name shouldn't be blank or have numbers or symbols.";
			$invalid = TRUE;
		}
		
		if(!preg_match("/^[1]{1}-[0-9]{3}-[0-9]{3}-[0-9]{4}$/", $e_num) == TRUE) {
 			$e_num_err = "* EMERGENCY NUM TELEPHONE FORMAT 1-111-111-1111.";
 			$invalid = TRUE;
		}
		
		if(!preg_match("/^[a-zA-Z]+$/", $type) == TRUE){
			$type_err =  "* Client Type shouldn't be blank or have numbers or symbols.";
			$invalid = TRUE;
		}
		
		
		if ($invalid) {
			//echo "<div style='background-color: orange; color: black; border-radius: 3px; border: 1px solid black; width: 45%; margin: auto auto;'";
			//echo '<div style="width:40%;margin-top:5%; margin-left: auto; margin-right: auto;"><div class="alert alert-danger">';
			//echo '<h1 class="text-danger">Employee Entry</h1>';
			//echo '<p class="text-danger">There are errors in your employee entry.</p>';
			//echo "<br>";

			$link = "client-enrollment.php?error=true&";

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
			
			if (!empty($addr_err)) {
				if (!empty($fname_err) || !empty($lname_err)) {
					$link .= "&";
				}
				//echo "<p class='text-danger'>".$addr_err."</p><hr>";
				$link .= "addr_err=$addr_err&addr-e=true";
			}
			
			if (!empty($dob_err)) {
				if (!empty($fname_err) || !empty($lname_err) || !empty($addr_err)) {
					$link .= "&";
				}
				//echo "<p class='text text-danger'>".$dob_err."</p><hr>";
				$link .= "dob_err=$dob_err&dob-e=true";
			}

			if (!empty($tele_err)) {
				if (!empty($fname_err) || !empty($lname_err) || !empty($addr_err) || !empty($dob_err)) {
					$link .= "&";
				}
				//echo "<p class='text text-danger'>".$dob_err."</p><hr>";
				$link .= "tele_err=$tele_err&tele-e=true";
			}
			
			if (!empty($e_name_err)) {
				if (!empty($fname_err) || !empty($lname_err) || !empty($addr_err) || !empty($dob_err) || !empty($tele_err)) {
					$link .= "&";
				}
				//echo "<p class='text text-danger'>".$jtitle_err."</p><hr>";
				$link .= "e_name_err=$e_name_err&e_name-e=true";
			}
			
			if (!empty($e_num_err)) {
				if (!empty($fname_err) || !empty($lname_err) || !empty($addr_err) || !empty($dob_err) || !empty($tele_err) || !empty($e_name_err)) {
					$link .= "&";
				}
				//echo "<p class='text text-danger'>".$hwork_err."<hr></p>";
				$link .= "e_num_err=$e_num_err&e_num-e=true";
			}
			
			if (!empty($type_err)) {
				if (!empty($fname_err) || !empty($lname_err) || !empty($addr_err) || !empty($dob_err) || !empty($tele_err) || !empty($e_name_err) || !empty($e_num_err)) {
					$link .= "&";
				}
				//echo "<p class='text text-danger'>".$prate_err."</p><hr>";
				$link .= "type_err=$type_err&type-e=true";
			}
			
			$link .= "&fn=$fname&ln=$lname&addr=$addr&dob=$dob&tele=$tele&e_name=$e_name&e_num=$e_num&type=$type";
			
			//echo "<br>";
			//echo "<a href='$link' class='btn btn-danger'>Fix Errors</a>";
			//echo "</div></div>";
			header("Location:$link");
			return;

		} else {

			//get the config file
			require('config.php');
			//write the query to get the data from the customer table
    		
			
			$sql = "SELECT count(*) as total FROM client";
			
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
				$sql_insert = "INSERT INTO client VALUES (?,?,?,?,?,?,?,?,?);";
				$stmt = $conn->prepare($sql_insert);
				$stmt->bind_param("issssssss", $id ,$fname, $lname, $addr, $dob, $tele, $e_name, $e_num, $type);
				echo $fname."<br>";
				echo $lname."<br>";
				echo $addr."<br>";
				echo $dob."<br>";
				echo ""."<br>";
				if ($stmt->execute()) {
					header("Location:client-menu.php?id=$id");
				} else {
					echo $stmt->error;
				} 	

			}
		}
	}
include('footer.php');
?>