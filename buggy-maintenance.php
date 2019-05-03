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
					<form action='check-buggy.php' method='POST'>
						<input class='btn-outline-dark  form-control' type='submit' name='Submit' value='Check Specific buggy'/>
					</form>
				</div>
				<div class='col-2'>
					<form action='buggy-maintenance.php' method='POST'>
						<input class='btn-outline-dark  form-control' type='submit' name='Submit' value='Reset Table'/>
					</form>
				</div>
				
				<div class='col-2'>
					<form action='buggy-menu.php' method='POST'>
						<input class='btn-outline-danger  form-control' type='submit' name='Submit' value='Go Back'/>
					</form>
				</div>
				<div class='col-sm'></div>
				
			</div>
			
			<div class='row'>
				<div class='col-0'></div>
				<div class='col'>
				<h4>Buggy Maintenance</h4>
				<table class="table table-dark table-borderless table-striped table-hover">
					<thead class='thead-dark'>
						<tr>
							
							<th scope="col">Buggy#</th>
							<th scope="col">Colour</th>
							<th scope="col">Duration</th>
							<th scope="col"># of Runs</th>
							<th scope="col">Runs Left</th>
							<th scope="col">Part#</th>
							<th scope="col">Part Name</th>
							<th scope="col">Part Run Rate</th>
							<th scope="col">Part Run Count</th>
						</tr>
					</thead>
					<tbody>
						<?php
							//get the config file
							require('includes/config.php');
					
							//write the query to get the data from the customer table
							if (isset($_GET['id'])) {
								$sql = "SELECT Buggy_ID, Colour, Run_Duration, Run_Count, Run_Left, Part_ID, Part_Name, Run_Rate, Part_Run_Count FROM buggy JOIN buggy_part USING(Buggy_ID) JOIN part USING(Part_ID) WHERE Buggy_ID=".$_GET["id"];
							} else {
								$sql = "SELECT Buggy_ID, Colour, Run_Duration, Run_Count, Run_Left, Part_ID, Part_Name, Run_Rate, Part_Run_Count FROM buggy JOIN buggy_part USING(Buggy_ID) JOIN part USING(Part_ID)";
							}
							
							
					
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
									echo "<td>".$row["Part_ID"]."</td>";
									echo "<td>".$row["Part_Name"]."</td>";
									echo "<td>".$row["Run_Rate"]."</td>";
									echo "<td>".$row["Part_Run_Count"]."</td>";
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
