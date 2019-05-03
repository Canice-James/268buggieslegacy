<!--client-menu.php-->


		<!--Header section-->
		<?php include('includes/header.php');?>
	
	
		<!--Main area-->
		<main>
		<!-- Place the main page content within this area.-->
		<div class="container-fluid">
			
			<div class='row'>
				<div class='col-0'></div>
				<div class='col-2'>
					<form action='client-enrollment.php' method='POST'>
						<input class='btn-outline-dark form-control' type='submit' name='Submit' value='Enroll New Client'/>
					</form>
				</div>
				<div class='col-2'>
					<form action='client-bookings.php' method='POST'>
						<input class='btn-outline-dark form-control' type='submit' name='Submit' value='Client Groups'/>
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
				<h4>Clients</h4>
				<table class="table table-dark table-borderless table-striped table-hover">
					<thead class='thead-dark'>
						<tr>
						  <th scope="col">#</th>
						  <th scope="col">First Name</th>
						  <th scope="col">Last Name</th>
						  <th scope="col">Address</th>
						  <th scope="col">DOB</th>
						  <th scope="col">Telephone</th>
						  <th scope="col">Emergency Contact</th>
						  <th scope="col">Emergency Contact Number</th>
						  <th scope="col">Type</th>
						</tr>
					</thead>
					<tbody>
						<?php
							require('includes/config.php');
							$sql = "SELECT * FROM Client";
			
							//run the query and store it in result
							$result = $conn->query($sql);
			
			
			
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
									echo "<td>".$row["Client_Addr"]."</td>";
									echo "<td>".$row["Client_DOB"]."</td>";
									echo "<td>".$row["Client_Phone"]."</td>";
									echo "<td>".$row["Client_emerg_contact"]."</td>";
									echo "<td>".$row["Client_emerg_contact_num"]."</td>";
									echo "<td>".$row["Type"]."</td>";
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