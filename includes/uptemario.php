<?php include 'ewp.php';
	
	
		
	//$_POST['unidad_id'];
	
	$materia_numero = $_POST['materia_numero'];
	$unidad_num = $_POST['unidad_num'];
	$unidad_titulo = $_POST['unidad_titulo'];
	$unidad_proposito = $_POST['unidad_proposito'];
	$unidad_desempeno = $_POST['unidad_desempeno'];
	$unidad_temario = $_POST['unidad_temario'];
	
	//$_POST['modulo_numero'];
	//$_POST['cuatrimestre_numero'];
	
	mysqli_set_charset($con,'utf8');
	$insertUNIDAD = mysqli_query($con,"INSERT INTO unidades(materia_numero,unidad_num,unidad_titulo,unidad_proposito,unidad_desempeno,unidad_temario)VALUES('$materia_numero','$unidad_num','$unidad_titulo','$unidad_proposito','$unidad_desempeno','$unidad_temario')");
	
$url = '../temarios.php';
		echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">'
	
	
?>