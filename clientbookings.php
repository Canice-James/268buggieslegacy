<!---->
<?php 
	//get the config file
	require('config.php');
	
	//write the query to get the data from the customer table
	$sql = "SELECT * FROM Client_Group;";
	
	//run the query and store it in result
	$result = $conn->query($sql);
	
	//if the number of rows in result is greater than 0
	if ($result->num_rows > 0) {
		
		while ($row = $result->fetch_assoc()) {		
			
			echo $row;
			
		}
				
	}
?>