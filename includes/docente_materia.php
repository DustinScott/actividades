<?php include('ewp.php');
	
	
	
	$d_id = $_POST['maestro_id'];
	$m_id = $_POST['materia_id'];
	
	$add_doc_mat =  mysqli_query($con,"UPDATE materias SET maestros_id='$d_id' WHERE materia_id='$m_id'");
	
	if($add_doc_mat){
		echo '<i class="fa fa-check" aria-hidden="true"></i>';
	}else{
		echo 'FAILED';
	}
	
	
	
?>