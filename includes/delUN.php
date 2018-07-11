<?php   include 'ewp.php'; 
	
	echo $delunidad = $_GET['delunidad'];
	
	$delthis = mysqli_query($con,"DELETE FROM unidades WHERE unidad_id=$delunidad");
	
	$url = '../et.php?deletedwas='.$delunidad.'';
		echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">'
	
	
	
	
?>