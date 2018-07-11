<?php include 'ewp.php';

	$clase_id = $_POST['clase_id'];
	$classvideotitle = $_POST['classvideotitle'];
	$classVid = $_POST['classVid'];
	$material = $_POST['material'];
	$unidad = $_POST['unidad'];
	
	
	if(!empty($classVid)){
	$upload= mysqli_query($con, "INSERT INTO video_embeds(clase_id,video_title,video_name,pos,materia_id,unidad_id)VALUES('$clase_id','$classvideotitle','$classVid',1,'$material','$unidad')");
	}
	
	

?>