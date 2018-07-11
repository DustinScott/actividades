<?php include 'ewp.php';
	
	
	// 	A=Activity F_= File F=Form M=Mataria U=Unidad V=Video 
	
	// Activity Material, Unidad, Video
	//Maestro
	 $CUR_M = $_POST["cur_maestro"];
	 //Material
	 $AFM = $_POST["AFM"];
	 //Unidad
	 $AFU = $_POST["AFU"];
	 
	 
	$queryCurrentUnidades = mysqli_query($con,"SELECT * FROM clases WHERE clases_unidad = '".$AFU."'");
	
	$num_rows = mysqli_num_rows($queryCurrentUnidades);
	 
	if($num_rows > 0){
	
	while($curUni = mysqli_fetch_array($queryCurrentUnidades)){
	
	echo 'Clase ya Existe...Abriendo Ahora <br /> <input type="hidden" id="upclaseR" value="'.$curUni['clases_id'].'">';	
	
	}
		
	}else{	
	//mysqli_set_charset('utf8');
	$queryClase = mysqli_query($con,"INSERT INTO clases(clases_maestro,clases_material, clases_unidad) VALUES ('$CUR_M','$AFM','$AFU')");
	$last_id = mysqli_insert_id($con);

	}


	if($queryClase){
		
		
		echo 'Clase Creado...Abriendo Ahora <br /> <input type="hidden" id="upclaseR" value="'.$last_id.'">';
		echo mysqli_error($con);
	}
/*	else{
		echo 'going';
		echo '<br />';
		echo mysqli_error($con);
	}
*/

	
/*

$url = 'http://leavirtual.com.mx/actividades/master_class.php';
		echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';	
*/


?>