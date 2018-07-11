<?php include 'ewp.php';
		
	$clase_id = $_POST['clase_id'];
	
	$queryFiles = mysqli_query($con,"SELECT * FROM clase_files WHERE clase_id='".$clase_id."'");
	
	// ACTION LIST
	// 1.) DELETE FILES FROM FOLDERS
	// 2.) DELETE FILES NAMES FROM CLASE_FILES TABLE
	// 3.) DELETE VIDEO FILES
	// 4.) DELETE ACTIVIDADES ACTIVOS WHERE CLASE ID IS ASSIGNED
	// 5.) DELETE CLASE WHERE CLASE_ID IS ASSIGNED
	
	
	// ACTION 1.) DELETE FILES FROM FOLDERS & CLASE_FILES TABLE
	
	
	while($qF = mysqli_fetch_array($queryFiles)){
		
		if($qF['file_type'] == 'l'){
			$path_to_delete = '../activity_files/clase/lectura/'.$qF['file_name'].'';
		}elseif($qF['file_type'] == 'p'){
			$path_to_delete = '../activity_files/clase/presentacion/'.$qF['file_name'].'';
		}elseif($qF['file_type'] == 'a'){
			$path_to_delete = '../activity_files/clase/actividad/'.$qF['file_name'].'';
		}
		
		unlink($path_to_delete);
	}
	
	
	
	// ACTION 2.) DELETE FILES NAMES FROM CLASE_FILES TABLE
	
	$del_filesnames_from_clase_files = mysqli_query($con,"DELETE FROM clase_files WHERE clase_id='$clase_id'");
	
	
	// ACTION 3.) DELETE VIDEO FILES
	
	$del_videos_from_videoembeds = mysqli_query($con,"DELETE FROM video_embeds WHERE clase_id='$clase_id'");
	


	// ACTION 4.) DELETE ACTIVIDADES ACTIVOS WHERE CLASE ID IS ASSIGNED 
	$del_active_activities = mysqli_query($con,"DELETE FROM actividades_activos WHERE clase_id='".$clase_id."'");
	
	
	
	// ACTION 5.) DELETE CLASE WHERE CLASE_ID IS ASSIGNED

	$del_clase = mysqli_query($con, "DELETE FROM clases WHERE clases_id='".$clase_id."'");
	
	if($del_clase){
	echo '
	<div id="myProgress">
		<div id="myBar"></div>
	</div>
	
	
	<script>
	
			  var elem = document.getElementById("myBar");   
			  var width = 1;
			  var id = setInterval(frame, 50);
			  function frame() {
			    if (width >= 100) {
			      clearInterval(id);
			    } else {
			      width++; 
			      elem.style.width = width + \'%\'; 
			    }
			  }
	
	</script>';

	}


	
?>

	