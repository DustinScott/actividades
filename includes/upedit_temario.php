<?php include 'ewp.php';
	
	
		
	//$_POST['unidad_id'];
	$unidad_id = $_POST['unidad_id'];
	$materia_numero = $_POST['materia_numero'];
	$unidad_num = $_POST['unidad_num'];
	$unidad_titulo = $_POST['unidad_titulo'];
	$unidad_proposito = $_POST['unidad_proposito'];
	$unidad_desempeno = $_POST['unidad_desempeno'];
	$unidad_temario = $_POST['unidad_temario'];
	
	//$_POST['modulo_numero'];
	//$_POST['cuatrimestre_numero'];
	
	
	
	
	
	mysqli_set_charset( $con, 'utf8');
	if(!empty($materia_numero)){
		$query = mysqli_query($con,"UPDATE unidades SET materia_numero=$materia_numero WHERE unidad_id = $unidad_id");
	}
	
	mysqli_set_charset( $con, 'utf8');
	if(!empty($unidad_num)){
		$query = mysqli_query($con,"UPDATE unidades SET unidad_num=$unidad_num WHERE unidad_id = $unidad_id");
	}
	mysqli_set_charset( $con, 'utf8');
	if(!empty($unidad_titulo)){
		$query = mysqli_query($con,"UPDATE unidades SET unidad_titulo='$unidad_titulo' WHERE unidad_id = $unidad_id");
	}
	mysqli_set_charset( $con, 'utf8');
	if(!empty($unidad_proposito)){
		$query = mysqli_query($con,"UPDATE unidades SET unidad_proposito='$unidad_proposito' WHERE unidad_id = $unidad_id");
	}
	mysqli_set_charset( $con, 'utf8');
	if(!empty($unidad_desempeno)){
		$query = mysqli_query($con,"UPDATE unidades SET unidad_desempeno='$unidad_desempeno' WHERE unidad_id = $unidad_id");
	}
	
	mysqli_set_charset( $con, 'utf8');
	if(!empty($unidad_temario)){
		$query = mysqli_query($con,"UPDATE unidades SET unidad_temario='$unidad_temario' WHERE unidad_id = $unidad_id");
	}
	
	
	
	
	
	
	
$url = '../et.php?parent='.$unidad_id.'';
		echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">'
	
	
?>