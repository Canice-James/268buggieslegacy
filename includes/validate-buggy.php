<!---->
<?php

function validate($colour, $run_d, $run_c, $run_l) {
		$invalid = FALSE;
		if(!preg_match("/^[a-zA-Z ]+$/", $colour) == TRUE){
			$colour_err =  "* Colour should be identified. Only alphabetical characters are allowed.";
			$invalid = TRUE;
		}
		
		if(!preg_match("/^[0-9]+$/", $run_d) == TRUE) {
			$run_d_err =  "* Run Duration should be numeric.";
			$invalid = TRUE;
		}
		
		if(!preg_match("/^[0-9]+$/", $run_c) == TRUE) {
			$run_c_err =  "* Run Count should be numeric.";
			$invalid = TRUE;
		}
		if(!preg_match("/^[0-9]+$/", $run_l) == TRUE) {
			$run_l_err =  "* Runs Left should be numeric.";
			$invalid = TRUE;
		}
		
		
		if ($invalid) {
			//echo "<div style='background-color: orange; color: black; border-radius: 3px; border: 1px solid black; width: 45%; margin: auto auto;'";
			//echo '<div style="width:40%;margin-top:5%; margin-left: auto; margin-right: auto;"><div class="alert alert-danger">';
			//echo '<h1 class="text-danger">Employee Entry</h1>';
			//echo '<p class="text-danger">There are errors in your employee entry.</p>';
			//echo "<br>";

			$link = "buggy-enrollment.php?error=true&";

			if (!empty($colour_err)) {
				//echo "<p class='text-danger'>".$colour_err."</p><hr>";
				$link .= "colour_err=$colour_err&colour-e=true";

			}

			if (!empty($run_d_err)) {
				if (!empty($colour_err)) {
					$link .= "&";
				}
				//echo "<p class='text-danger'>".$lname_err."</p><hr>";
				$link .= "run_d_err=$run_d_err&run_d-e=true";
			}
			
			if (!empty($run_c_err)) {
				if (!empty($colour_err) || !empty($run_d_err)) {
					$link .= "&";
				}
				//echo "<p class='text-danger'>".$addr_err."</p><hr>";
				$link .= "run_c_err=$run_c_err&run_c-e=true";
			}
			
			if (!empty($run_l_err)) {
				if (!empty($colour_err) || !empty($run_d_err) || !empty($run_c_err)) {
					$link .= "&";
				}
				//echo "<p class='text text-danger'>".$dob_err."</p><hr>";
				$link .= "run_l_err=$run_l_err&run_l-e=true";
			}

			
			
			$link .= "&colour=$colour&run_d=$run_d&run_c=$run_c&run_l=$run_l";
			
			//echo "<br>";
			//echo "<a href='$link' class='btn btn-danger'>Fix Errors</a>";
			//echo "</div></div>";
			header("Location:$link");
			return;

		} else {

			//get the config file
			require('config.php');
			//write the query to get the data from the customer table
    		
			
			$sql = "SELECT count(*) as total FROM buggy";
			
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
				$sql_insert = "INSERT INTO buggy VALUES (?,?,?,?,?);";
				$stmt = $conn->prepare($sql_insert);
				$stmt->bind_param("isiii", $id ,$colour, $run_d, $run_c, $run_l);
				echo $colour."<br>";
				echo $run_d."<br>";
				echo $run_c."<br>";
				echo $run_l."<br>";
				echo ""."<br>";
				if ($stmt->execute()) {
					
					$sql2 = "SELECT Part_ID, Run_Rate FROM part";
					$result2 = $conn->query($sql2);
					
					if ($result2->num_rows > 0) {
						while ($row = $result2->fetch_assoc()) {
							$sql3 = "INSERT INTO buggy_part VALUES(?, ?, ?);";
							$stmt3 = $conn->prepare($sql3);
							$stmt3->bind_param("iii", $id ,$row['Part_ID'], $row['Run_Rate']);
							if ($stmt3->execute()) {
								echo "Record added";
							}
						}
					}
					header("Location:buggy-menu.php?id=$id");
				} else {
					echo $stmt->error;
				} 	

			}
		}
	}
include('footer.php');
?>