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
					<form action='tour-menu.php' method='POST'>
						<input class='btn-outline-danger form-control' type='submit' name='Submit' value='Go Back'/>
					</form>
				</div>
				<div class='col-sm'></div>
				
			</div>
			
			<div class='row'>
				<div class='col-0'></div>
				<div class='col'>
					<h4>More Tour Information</h4>
					<?php 
						require('includes/config.php');
					
						$sql = "SELECT Client_Fname as f, Client_Lname as l FROM client WHERE Client_ID = ".$_GET['cid'].""  ;
				
						$result = $conn->query($sql);
					
						if ($result->num_rows > 0) {
							$id = 0;
							while ($row = $result->fetch_assoc()) {
							
								echo "<div class='col-3 alert alert-dark'>";
								echo "<h5>Client Name: ".$row['f']." ".$row['l']."</h5>";
								echo "<h5>Tour#: ".$_GET["tid"]."</h5>";
								echo "</div>";
							}
						}
					?>
					<h5>Employees on this tour</h5>
					<table class="table table-dark table-borderless table-striped table-hover">
						<thead class='thead-dark'>
							<tr>
							  <th scope="col">Employee #</th>
							  <th scope="col">First Name</th>
							  <th scope="col">Last Name</th>
							  <th scope="col">Job Description</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$sql = "SELECT * FROM employee JOIN employee_tour USING(Emp_ID) WHERE Tour_ID = ".$_GET['tid'];
				
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
										echo "<td>".$row["Emp_ID"]."</td>";
										echo "<td>".$row["Emp_Fname"]."</td>";
										echo "<td>".$row["Emp_Lname"]."</td>";
										echo "<td>".$row["Job_title"]."</td>";
										echo "</tr>";
									}
								}
							?>
						</tbody>
					</table>
					
					<h5>Buggies On This Tour</h5>
					<table class="table table-dark table-borderless table-striped table-hover">
						<thead class='thead-dark'>
							<tr>
							  <th scope="col">Buggy #</th>
							  <th scope="col">Colour</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$sql = "SELECT * FROM buggy JOIN buggy_tour USING(Buggy_ID) WHERE Tour_ID = ".$_GET['tid'];
				
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
										echo "</tr>";
									}
								}
							?>
						</tbody>
					</table>
					
					<h5>Client Group Members</h5>
					<table class="table table-dark table-borderless table-striped table-hover">
						<thead class='thead-dark'>
							<tr>
							  <th scope="col">Member#</th>
							  <th scope="col">First Name</th>
							  <th scope="col">Last Name</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$sql = "SELECT * FROM `group_member` WHERE Tour_ID = ".$_GET["tid"]." AND Client_ID = ".$_GET["cid"];
				
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
										echo "<td>".$row["Member_ID"]."</td>";
										echo "<td>".$row["mem_Fname"]."</td>";
										echo "<td>".$row["mem_Lname"]."</td>";
										echo "<td>".$row["mem_Address"]."</td>";
										echo "<td>".$row["mem_Phone"]."</td>";
										echo "</tr>";
									}
								}
							?>
						</tbody>
					</table>
					<a href='#TOP' class='btn btn-outline-dark'>Return to the top of the page</a>
				</div>
				<div class='col-0'></div>
			</div>
		</main>

<!--Footer area-->
<?php include('includes/footer.php')?>
