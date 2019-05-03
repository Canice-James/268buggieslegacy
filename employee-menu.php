<!-- Employee Menu-->

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
				
					<form action='employee-enrollment.php' method='POST'>
						<input class='btn-outline-dark form-control' type='submit' name='Submit' value='Enroll New Employee'/>
					</form>
				</div>
				<div class='col-2'>
					<form action='assign-privilages.php' method='POST'>
						<input class='btn-outline-dark form-control' type='submit' name='Submit' value='Assign Privilages'/>
					</form>
				</div>
				<div class='col-2'>
					<form action='admin-dash.php' method='POST'>
						<input class='btn-outline-danger form-control' type='submit' name='Submit' value='Go Back'/>
					</form>
				</div>
			</div>
			
			<div class='row'>
				<div class='col-0'></div>
				<div class='col'>
				<h4>Employees</h4>
				<table class="table table-dark table-borderless table-striped table-hover">
					<thead class='thead-dark'>
						<tr>
						  <th scope="col">#</th>
						  <th scope="col">First Name</th>
						  <th scope="col">Last Name</th>
						  <th scope="col">Telephone</th>
						  <th scope="col">Address</th>
						  <th scope="col">DOB</th>
						  <th scope="col">Job Title</th>
						  <th scope="col">Hours Worked</th>
						  <th scope="col">Pay Rate</th>
						  <th scope="col">SSN</th>
						  <th scope="col">MBN</th>
						</tr>
					</thead>
					<tbody>
						<?php
							require('includes/config.php');
							$sql = "SELECT * FROM employee";
			
							//run the query and store it in result
							$result = $conn->query($sql);
			
			
			
							//if the number of rows in result is greater than 0
							
							if ($result->num_rows > 0) {
								$id = 0;
								while ($row = $result->fetch_assoc()) {
									if (isset($_GET['id']) && $_GET['id'] == $row["Emp_ID"]) {
										echo "<tr class='text-success'>";
									} else {
										echo "<tr>";
									}
										echo "<td>".$row["Emp_ID"]."</td>";
										echo "<td>".$row["Emp_Fname"]."</td>";
										echo "<td>".$row["Emp_Lname"]."</td>";
										echo "<td>".$row["Emp_Phone"]."</td>";
										echo "<td>".$row["Emp_Addr"]."</td>";
										echo "<td>".$row["Emp_DOB"]."</td>";
										echo "<td>".$row["Job_title"]."</td>";
										echo "<td>".$row["Hours_worked"]."</td>";
										echo "<td>".$row["Pay_rate"]."</td>";
										echo "<td>".$row["Emp_Ssn"]."</td>";
										echo "<td>".$row["Emp_Mbn"]."</td>";
										echo "</tr>";
								}
							}
						?>
					</tbody>
				</table>
				<a href='#TOP' class='btn btn-outline-dark'>Back To Top	</a>
			</div>
			<div class='col-0'></div>
		</div>
		</main>

<!--Footer area-->
<?php include('includes/footer.php')?>
