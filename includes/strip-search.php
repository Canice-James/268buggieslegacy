<!--strip-search.php-->
<?php 

	function checkSecurity($data) {
		$data = trim($data);
		$data = stripslashes($data);
		$data = htmlspecialchars($data);
		return $data;
	}
?>