<?php include '../includes/ewp.php';
	
	if(!empty($_POST['update_html_id'])){
		$row = $_POST['update_html_id'];
	}
	if(!empty($_POST['thecode'])){
		$code = $_POST['thecode'];
	}
	
	$update = mysqli_query($con,"UPDATE html SET html_code='$code' WHERE html_id='$row'");
	
	if($update){
		echo '<i class="fa fa-check-circle" aria-hidden="true"></i> Cambios Guardados' ;
	}else{
		echo '<i class="fa fa-frown-o" aria-hidden="true"></i>'; 
		echo mysqli_error($con);
	}
	?>