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
					<form action='parts-menu.php' method='POST'>
						<input class='btn-outline-danger  form-control' type='submit' name='Submit' value='Go Back'/>
					</form>
				</div>
				<div class='col-sm'></div>
				
			</div>
			
			<div class='row'>
				<div class='col-0'></div>
				<div class='col'>
				<h4>Part Information</h4>
				<table class="table table-dark table-borderless table-striped table-hover">
					<thead class='thead-dark'>
						<tr>
							<th scope="col">Supplier#</th>
							<th scope="col">Unit_Price</th>
							<th scope="col">Order_Date</th>
							<th scope="col">Quantity</th>
							<th scope="col">Action</th>
						</tr>
					</thead>
					<tbody>
						<?php
							//get the config file
							require('includes/config.php');
					
							//write the query to get the data from the customer table
							$sql = "SELECT Supplier_ID, Unit_Price, Order_Date, Quantity FROM part WHERE Part_ID = ".$_GET['id'];
							
							
					
							//run the query and store it in result
							$result = $conn->query($sql);
							
							//if the number of rows in result is greater than 0
							if ($result->num_rows > 0) {
								$id = 0;
								while ($row = $result->fetch_assoc()) {
									if (isset($_GET['id']) && $_GET['id'] == $row["Supplier_ID"]) {
										echo "<tr class='text-success'>";
									} else {
										echo "<tr>";
									}
									echo "<td>".$row["Supplier_ID"]."</td>";
									echo "<td>".$row["Unit_Price"]."</td>";
									echo "<td>".$row["Order_Date"]."</td>";
									echo "<td>".$row["Quantity"]."</td>";
									echo "<td>"."<a href='supplier-information.php?id=".$row["Supplier_ID"]."&pid=".$_GET['id']."' class='btn btn-outline-light'>"."Check Supplier</a>"."</td>";
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
