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
					<form action='buggy-maintenance.php?id=501' method='POST'>
						<input class='btn-outline-danger  form-control' type='submit' name='Submit' value='Go Back'/>
					</form>
				</div>
				<div class='col-sm'></div>
				
			</div>
			
			<div class='row'>
				<div class='col-0'></div>
				<div class='col'>
				<h4>Check Buggy</h4>
				<table class="table table-dark table-borderless table-striped table-hover">
					<thead class='thead-dark'>
						<tr>
							
							<th scope="col">Buggy#</th>
							<th scope="col">Colour</th>
							<th scope="col">Duration</th>
							<th scope="col"># of Runs</th>
							<th scope="col">Runs Left</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							//get the config file
							require('includes/config.php');
					
							//write the query to get the data from the customer table
							$sql = "SELECT Buggy_ID, Colour, Run_Duration, Run_Count, Run_Left FROM buggy";
							
							
					
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
									$bid = $row["Buggy_ID"];
									echo "<td>".$row["Buggy_ID"]."</td>";
									echo "<td>".$row["Colour"]."</td>";	
									echo "<td>".$row["Run_Duration"]."</td>";
									echo "<td>".$row["Run_Count"]."</td>";
									echo "<td>".$row["Run_Left"]."</td>";
									echo "<td><a href='buggy-maintenance.php?id=$bid' class='btn btn-outline-light'>Check</a></td>";
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
