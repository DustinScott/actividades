<?php   include 'ewp.php'; 
	
	$delTabla = $_GET['delTabla'];
	
	$delthis = mysqli_query($con,"DELETE FROM tables WHERE tables_id=$delTabla");
	
	$url = '../tablas.php';
		echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">'
	
	
	
	
?>