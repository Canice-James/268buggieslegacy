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
					<form action='part-information.php?<?php echo "id=".	$_GET["pid"]?>' method='POST'>
						<input class='btn-outline-danger  form-control' type='submit' name='Submit' value='Go Back'/>
					</form>
				</div>
				<div class='col-sm'></div>
				
			</div>
			
			<div class='row'>
				<div class='col-0'></div>
				<div class='col'>
				<h4>Supplier</h4>
				<table class="table table-dark table-borderless table-striped table-hover">
					<thead class='thead-dark'>
						<tr>
							<th scope="col">Supplier#</th>
							<th scope="col">Company Name</th>
							<th scope="col">Rep Name</th>
							<th scope="col">Phone</th>
							<th scope="col">Email</th>
							<th scope="col">Fax</th>
						</tr>
					</thead>
					<tbody>
						<?php
							//get the config file
							require('includes/config.php');
					
							//write the query to get the data from the customer table
							$sql = "SELECT * FROM supplier WHERE Supplier_ID = ".$_GET['id'];
							
							
					
							//run the query and store it in result
							$result = $conn->query($sql);
							
							//if the number of rows in result is greater than 0
							if ($result->num_rows > 0) {
								$id = 0;
								while ($row = $result->fetch_assoc()) {
									echo "<td>".$row["Supplier_ID"]."</td>";
									echo "<td>".$row["Company_Name"]."</td>";
									echo "<td>".$row["Rep_Name"]."</td>";
									echo "<td>".$row["Supplier_Phone"]."</td>";
									echo "<td>".$row["Supplier_Email"]."</td>";
									echo "<td>".$row["Supplier_Fax"]."</td>";
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