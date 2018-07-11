<?php   include 'ewp.php'; 
	
	$delmaestro = $_GET['delmaestro'];
	
	$delthis = mysqli_query($con,"DELETE FROM maestros WHERE maestros_id=$delmaestro");
	
	$url = '../maestros.php';
		echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">'
	
	
	
	
?>