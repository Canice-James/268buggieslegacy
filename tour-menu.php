<!--Tour Menu-->

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
					<form action='tour-enrollment.php' method='POST'>
						<input class='btn-outline-dark  form-control' type='submit' name='Submit' value='Book Tour'/>
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
				<h4>Tours</h4>
				<table class="table table-dark table-borderless table-striped table-hover">
					<thead class='thead-dark'>
						<tr>
							<th scope="col">Tour #</th>
							<th scope="col">Group</th>
							<th scope="col">Route</th>
							<th scope="col">Date</th>
							<th scope="col">Time</th>
							<th scope="col">Price</th>
							<th scope="col">Members</th>
							<th scope="col">Equipment</th>
							<th scope="col">Buggies Used</th>
							<th scope="col" style='text-align: center'>Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							require('includes/config.php');
							$sql = "SELECT * FROM tours;";
							
							
							
							//run the query and store it in result
							//$sql = "drop table employee_tour;";
						/*	if ($conn->query($sql)) {
								echo "done";
							} else {
								echo $conn->error;
							} */
							
							$result = $conn->query($sql);
							
							//if the number of rows in result is greater than 0
							
							if ($result->num_rows > 0) {
								while ($row = $result->fetch_assoc()) {
									if (isset($_GET['id']) && $_GET['id'] == $row["Tour_ID"]) {
										echo "<tr class='text-success'>";
									} else {
										echo "<tr>";
										//print_r($row);
										//return;
									}
									echo "<td>".$row["Tour_ID"]."</td>";
									echo "<td>".$row["Group_Tour"]."</td>";
									echo "<td>".$row["Route"]."</td>";
									echo "<td>".$row["Date"]."</td>";
									echo "<td>".$row["Time"]."</td>";
									echo "<td>".$row["Price"]."</td>";
									echo "<td>".$row["No_Partic"]."</td>";
									echo "<td>".$row["Equip_requested"]."</td>";
									echo "<td>".$row["Num_of_Buggies"]."</td>";
									echo "<td><a class='btn btn-outline-light' href='tour-information.php?tid=".$row["Tour_ID"]."&cid=".$row['Client_ID']."'>More Info</a> 
									</td>";
									echo "</tr>";
								}
							} else {
								echo $conn->error;
							}
						?>
					</tbody>
				</table>
			</div>
			<div class='col-0'></div>
		</div>
		</main>

<!--Footer area-->
<?php include('includes/footer.php')?>
