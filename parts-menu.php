<!---->
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
					<form action='part-enrollment.php' method='POST'>
						<input class='btn-outline-dark  form-control' type='submit' name='Submit' value='Enroll Part'/>
					</form>
				</div>
				
				<div class='col-2'>
					<form action='admin-dash.php' method='POST'>
						<input class='btn-outline-danger  form-control' type='submit' name='Submit' value='Go Back'/>
					</form>
				</div>
				<div class='col-sm'></div>
				
			</div>
			
			<div class='row'>
				<div class='col-0'></div>
				<div class='col'>
				<h5>Parts</h5>
				<table class="table table-dark table-borderless table-striped table-hover">
					<thead class='thead-dark'>
						<tr>
							<th scope="col">Part#</th>
							<th scope="col">Part Name</th>
							<th scope="col">Run Rate</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							//get the config file
							require('includes/config.php');
					
							//write the query to get the data from the customer table
							$sql = "SELECT Part_ID, Part_Name, Run_Rate FROM part";
							
							
					
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
									echo "<td>".$row["Part_ID"]."</td>";
									echo "<td>".$row["Part_Name"]."</td>";
									echo "<td>".$row["Run_Rate"]."</td>";
									echo "<td><a class='btn btn-outline-light' href='part-information.php?id=".$row["Part_ID"]."'>More Info</a></td>";
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
