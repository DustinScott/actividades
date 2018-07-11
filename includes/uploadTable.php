<?php include 'ewp.php';
	
	$tableConent = $_POST['tableContent'];
	$tableA = $_POST['tableA'];
	$tableH = $_POST['tableH'];
	
	$upload = mysqli_query($con,"INSERT INTO tables (tables_actividad,tables_hermamientas,tables_code) VALUES('$tableA','$tableH','$tableConent')");
	
	if($upload){
		
		$result = 'Successful';		
		
		echo $result;
		
	}elseif(!$upload){
		
		$result = 'Did not Upload';
		
		echo $result;
	}
	

?>