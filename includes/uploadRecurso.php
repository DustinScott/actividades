<?php include 'ewp.php';
	
	// need to mysqli_real_escape_string..
	
	$clase_id = $_POST['clase_id'];
	$nameofactivity = $_POST['nameofactivity'];
	$AF_A  = $_POST['AF_A'];	
	$AF_H  = $_POST['AF_H'];	
	$AIS_A  = $_POST['AIS_A'];	
	$AF_IN_x  = $_POST['AF_IN_x'];
	$randomX = $_POST['RAND_NUM'];
	$getClase = mysqli_query($con, 'SELECT * FROM clases WHERE clases_id = '.$clase_id.'');
	
	while($c = mysqli_fetch_array($getClase)){
		
	$query = mysqli_query($con, "INSERT INTO actividades_activos(clase_id,materia_id,unidad_id,nameof,actividad_name,herramientas_name,actividad_instructiones,integradora,random_id)
			                     VALUES('".$clase_id."','".$c['clases_material']."','".$c['clases_unidad']."','".$nameofactivity."','".$AF_A."','".$AF_H."','".$AIS_A."','".$AF_IN_x."',".$randomX.")");
	
	}
						  	  
