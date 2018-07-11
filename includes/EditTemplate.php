<?php include 'ewp.php';
$f = mysqli_real_escape_string($con,$_POST['thefile']);
$c_id = $_POST['clase_id'];

$getUnidad = mysqli_query($con,"SELECT clases_unidad FROM clases WHERE clases_id=".$c_id."");

	while ($c_uni = mysqli_fetch_array($getUnidad)){
	
	$file_unidad = $c_uni['clases_unidad'];
	
		$getPlantilla = mysqli_query($con,"SELECT plantilla FROM clase_files WHERE file_unidad = ".$file_unidad." AND file_name ='".$f."'");
		
		while($p = mysqli_fetch_array($getPlantilla)){
			
			echo $p['plantilla'];
			
		}
	
	}

?>