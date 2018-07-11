<?php include '../includes/ewp.php';
	
	if(!empty($_POST['fl_id'])){
		echo $fl_id = $_POST['fl_id'];
	}else{
		echo 'not loaded';
	}
	
	if(!empty($_POST['plantillaX'])){
		$plantillaX = $_POST['plantillaX']; 
		echo $planTX = mysqli_real_escape_string($con,$plantillaX);
	}else{
		echo 'not loaded';
	}
	
	
	if(!empty($_POST['newCodeTitle'])){
		
		echo $newCodeTitle = $_POST['newCodeTitle'];
		
	}else{
		echo 'not loaded';
	}
	
	if(!empty($_POST['html_code_id'])){
		$html_code_id = $_POST['html_code_id'];
	}

	
/*
	if(!empty($_POST['html_code_id'])){
		$html_code_id = $_POST['html_code_id'];
	
		$queryUpdateHtml = mysqli_query($con,"UPDATE html SET html_code='$planTX' WHERE clase_files_id='$fl_id'");
						
						if($queryUpdateHtml){
							echo '<br /><i id="closePlantillaMsg" class="fa fa-times fa-lg right" aria-hidden="true" style="color:#333;"></i><hr/ style="border:0px; color:#ccc;">';
							echo '<h1>Exito! </h1>';
							echo '<h5>Gracias '.$_SESSION['username'].', su codigo fue convertido y se guardo con exito. <span id="shareSectionShowBtn"class="button tiny radius secondary"> <i class="fa fa-share" aria-hidden="true"></i> Exportalo Aqui</span></h5>';
							echo '<div id="shareSectionShow" style="display:none;"><hr /><textarea><iframe frameborder="0" width="100%" height="1300px" src="http://leavirtual.com.mx/actividades/ppt.php?id='.$fl_id.'"></textarea></div>';
							//echo mysqli_error($con);
						}
	
	}elseif(empty($_POST['html_code_id'])){
*/
	
	$newHtml = mysqli_query($con,"INSERT INTO html(clase_files_id,html_course_title,html_code) VALUES('$fl_id','$newCodeTitle','$planTX')");
	
	$last_id = mysqli_insert_id($con);
							
							if($newHtml){
							echo '<br /><i id="closePlantillaMsg" class="fa fa-times fa-lg right" aria-hidden="true" style="color:#333;"></i><hr/ style="border:0px; color:#ccc;">';
							echo '<h1>Exito! Nuevo Archivo Añadido </h1>';
							echo '<h5>Gracias '.$_SESSION['username'].', su codigo fue convertido y se guardo con exito. <span id="shareSectionShowBtn"class="button tiny radius secondary"> <i class="fa fa-share" aria-hidden="true"></i> Exportalo Aqui</span></h5>';
							echo '<div id="shareSectionShow" style="display:none;"><hr /><textarea><iframe frameborder="0" width="100%" height="1300px" src="http://leavirtual.com.mx/actividades/pptx.php?id='.$last_id.'"></textarea></div>';
							//echo mysqli_error($con);
							}else{
								echo 'check your code';
								mysqli_error($newHtml);
							}
	
// 	}
	
	
	
	

	 	
			
	

		
?>	
