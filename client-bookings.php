<!---->

<!--Buggy Menu-->

	<body>

		<!--Header section-->
		<?php include('includes/header.php');?>
	
	
		<!--Main area-->
		<main>
		<!-- Place the main page content within this area.-->
		<div class="container-fluid">
			
			<div class='row'>
				<div class='col-0'></div>
				
				<div class='col-2'>
					<form action='client-menu.php' method='POST'>
						<input class='btn-outline-danger  form-control' type='submit' name='Submit' value='Go Back'/>
					</form>
				</div>
				<div class='col-sm'></div>
				
			</div>
			
			<div class='row'>
				<div class='col-0'></div>
				<div class='col'>
				<h4>Client Groups</h4>
				<table class="table table-dark table-borderless table-striped table-hover">
					<thead class='thead-dark'>
						<tr>
							<th scope="col">Client#</th>
							<th scope="col">Client First Name</th>
							<th scope="col">Client Last Name</th>
							<th scope="col">Member#</th>
							<th scope="col">Member First Name</th>
							<th scope="col">Member Last Name</th>
							<th scope="col">Phone</th>
							<th scope="col">Address</th>
							<th scope="col">Tour Date</th>
						</tr>
					</thead>
					<tbody>
						<?php
							//get the config file
							require('includes/config.php');
					
							//write the query to get the data from the customer table
							$sql = "SELECT * FROM group_member JOIN Client USING(Client_ID);";
							
							
					
							//run the query and store it in result
							$result = $conn->query($sql);
							if ($result->num_rows == 0) echo "Failed";
							//if the number of rows in result is greater than 0
							if ($result->num_rows > 0) {
								$id = 0;
								while ($row = $result->fetch_assoc()) {
									if (isset($_GET['id']) && $_GET['id'] == $row["Client_ID"]) {
										echo "<tr class='text-success'>";
									} else {
										echo "<tr>";
									}
									echo "<td>".$row["Client_ID"]."</td>";
									echo "<td>".$row["Client_Fname"]."</td>";	
									echo "<td>".$row["Client_Lname"]."</td>";
									echo "<td>".$row["Member_ID"]."</td>";
									echo "<td>".$row["mem_Fname"]."</td>";
									echo "<td>".$row["mem_Lname"]."</td>";
									echo "<td>".$row["mem_Phone"]."</td>";
									echo "<td>".$row["mem_Address"]."</td>";
									echo "<td>".$row["mem_Tour_Date"]."</td>";
									echo "</tr>";
								}
							}
						?>
					</tbody>
				</table>
				<a href='#TOP' class='btn btn-outline-dark'>Back to Top</a>
			</div>
			<div class='col-0'></div>
		</div>
		</main>

<!--Footer area-->
<?php include('includes/footer.php')?>
