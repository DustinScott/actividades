<?php include 'ewp.php';
	
	$RanDom = rand(0,1000000000);
	
	
	$getActividades = mysqli_query($con, "SELECT random_id FROM actividades_activos WHERE random_id = $RanDom");
	
	$nR = mysqli_num_rows($getActividades);
	
	if($nR == 0){
		echo $RanDom;
	}else{
		echo $RanDom - 89;
		}
	
	
?>