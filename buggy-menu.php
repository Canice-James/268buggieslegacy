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
					<form action='buggy-enrollment.php' method='POST'>
						<input class='btn-outline-dark form-control' type='submit' name='Submit' value='Enroll New Buggy'/>
					</form>
				</div>
				<div class='col-2'>
					<form action='buggy-maintenance.php' method='POST'>
						<input class='btn-outline-dark form-control' type='submit' name='Submit' value='Maintenance'/>
					</form>
				</div>
				<div class='col-2'>
					<form action='admin-dash.php' method='POST'>
						<input class='btn-outline-danger form-control' type='submit' name='Submit' value='Go Back'/>
					</form>
				</div>
				<div class='col-sm'></div>
				
			</div>
			
			<div class='row'>
				<div class='col-0'></div>
				<div class='col'>
				<h4>Buggies</h4>
				<table class="table table-dark table-borderless table-striped table-hover">
					<thead class='thead-dark'>
						<tr>
						  <th scope="col">#</th>
						  <th scope="col">Color</th>
						  <th scope="col">Run Duration</th>
						  <th scope="col">Run Count</th>
						  <th scope="col">Runs Left</th>
						</tr>
					</thead>
					<tbody>
						<?php
							require('includes/config.php');
							$sql = "SELECT * FROM buggy";
			
							//run the query and store it in result
							$result = $conn->query($sql);
			
			
			
							//if the number of rows in result is greater than 0
							
							if ($result->num_rows > 0) {
								$id = 0;
								while ($row = $result->fetch_assoc()) {
									if (isset($_GET['id']) && $_GET['id'] == $row["Buggy_ID"]) {
										echo "<tr class='text-success'>";
									} else {
										echo "<tr>";
									}
									echo "<td>".$row["Buggy_ID"]."</td>";
									echo "<td>".$row["Colour"]."</td>";
									echo "<td>".$row["Run_Duration"]."</td>";
									echo "<td>".$row["Run_Count"]."</td>";
									echo "<td>".$row["Run_Left"]."</td>";
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
