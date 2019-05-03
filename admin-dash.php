<!--admin-dash.php -->


		<!--Header section-->
		<?php include('includes/header.php')?>
	
		
	
		<!--Main area-->
		<main>
		<!-- Place the main page content within this area.-->
			<div class="container-fluid">
				<div class='row'>
					<div class='col-sm'></div>
					<div class='col-sm'>
						<div class='card' style='background-color: black;'>
						<div class='card-title' >
							<p style='background-color:navy; color: white; font-family: times new roman; font-weight:bold; text-align: center;'>
							Money Earned</p>
							<p style='color: white; text-align: center'>
								<?php
									require('includes/config.php');
									$sql = "SELECT SUM(Price) as".'"Money Earned"'."FROM tours";
					
									//run the query and store it in result
									$result = $conn->query($sql);
					
					
					
									//if the number of rows in result is greater than 0
									
									if ($result->num_rows > 0) {
										$id = 0;
										while ($row = $result->fetch_assoc()) {
											echo $row['Money Earned'];
						
										}
									}
								?>
							</p>
						</div>
						</div>
					</div>
					<div class='col-sm'>
						<div class='card' style='background-color: black;'>
						<div class='card-title' >
							<p style='background-color:navy; color: white; font-family: times new roman; font-weight:bold; text-align: center;'>
							# of Incidents</p>
							<p style='color: white; text-align: center'>
								<?php
									$sql = "SELECT COUNT(*) as total FROM Incident;";
					
									//run the query and store it in result
									$result = $conn->query($sql);
					
					
					
									//if the number of rows in result is greater than 0
									
									if ($result->num_rows > 0) {
										$id = 0;
										while ($row = $result->fetch_assoc()) {
											echo $row['total'];
											
										}
									}
								?>
							</p>
						</div>
						</div>
					</div>
					<div class='col-sm'>
						<div class='card' style='background-color: black;'>
						<div class='card-title' >
							<p style='background-color:navy; color: white; font-family: times new roman; font-weight:bold; text-align: center;'>
							Most Recent Incident</p>
							<p style='color: white; text-align: center'>
								<?php
									$sql = "SELECT * FROM Incident HAVING MAX(Date);";
					
									//run the query and store it in result
									$result = $conn->query($sql);
					
									//if the number of rows in result is greater than 0
									
									if ($result->num_rows > 0) {
										$id = 0;
										while ($row = $result->fetch_assoc()) {
											echo $row['Incid_desc'];
					
									}
									}
								?>
							</p>
						</div>
						</div>
					</div>
					<div class='col-sm'>
						<div class='card' style='background-color: black;'>
						<div class='card-title' >
							<p style='background-color:navy; color: white; font-family: times new roman; font-weight:bold; text-align: center;'>Query</p>
							<p style='color: white; text-align: center'>Result</p>
						</div>
						</div>
					</div>
					<div class='col-sm'>
						<div class='card' style='background-color: black;'>
						<div class='card-title' >
							<p style='background-color:navy; color: white; font-family: times new roman; font-weight:bold; text-align: center;'>
							Query</p>
							<p style='color: white; text-align: center'>Result</p>
						</div>
						</div>
					</div>
					<div class='col-sm'></div>
				</div>
				
				<!--Second Row-->
				<div class='row' style='margin-top: 2%;'>
					<div class='col-sm'></div>
					<div class='col-sm'>
						<form action='employee-menu.php' method='POST'>
						<input class='btn-outline-dark form-control' type='submit' name='Submit' value='Employees'/>
						</form>
					</div>
					<div class='col-sm'>
						<form action='client-menu.php' method='POST'>
						<input class='btn-outline-dark form-control' type='submit' name='Submit' value='Clients'/>
						</form>
					</div>
					<div class='col-sm'>
						<form action='buggy-menu.php' method='POST'>
						<input class='btn-outline-dark form-control' type='submit' name='Submit' value='Buggies'/>
						</form>
					</div>
					<div class='col-sm'>
						<form action='parts-menu.php' method='POST'>
						<input class='btn-outline-dark form-control' type='submit' name='Submit' value='Parts'/>
						</form>
					</div>
					<div class='col-sm'>
						<form action='supplier-menu.php' method='POST'>
							<input class='btn-outline-dark form-control' type='submit' name='Submit' value='Suppliers'/>
						</form>
					</div>
					<div class='col-sm'></div>
				</div>
				
				<!--Third Row-->
				<div class='row' style='margin-top: 2%;'>
					<div class='col-sm'></div>
					<div class='col-sm'>
						<form action='tour-menu.php' method='POST'>
						<input class='btn-outline-dark form-control' type='submit' name='Submit' value='Tours'/>
						</form>
					</div>
					<div class='col-sm'>
						<form action='agent-menu.php' method='POST'>
						<input class='btn-outline-dark form-control' type='submit' name='Submit' value='Agents'/>
						</form>
					</div>
					<div class='col-sm'>
						<!--Insert form button here for navigation-->
					</div>
					<div class='col-sm'>
						<!--Insert form button here for navigation-->
					</div>
					<div class='col-sm'>
						<!--Insert form button here for navigation-->
					</div>
					<div class='col-sm'></div>
				</div>
			</div>
			
			
		</main>

<!--Footer area-->
<?php include('includes/footer.php');
