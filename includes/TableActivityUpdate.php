<?php include 'ewp.php';

if(!empty($_POST['NEWTABLE'])){
	
	$change = $_POST['NEWTABLE'];
	$column = 'actividad_instructiones';
	
}

if(!empty($_POST['NEW_HONE'])){
	
	
	$change = $_POST['NEW_HONE'];
	$column = 'nameof';
	
}

if(!empty($_POST['activityid'])){
	
	$acitvityid = $_POST['activityid'];
}	


	
	$updateTable = mysqli_query($con,"UPDATE actividades_activos SET $column='$change' WHERE actividades_vivos='$acitvityid'");
	
	if($updateTable){
		echo 'TABLE UPDATED';
	}

	
?>