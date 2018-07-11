<?php include 'ewp.php';

$del = $_POST['claseId'];
	


$getUnidad = mysqli_query($con,"SELECT clases_unidad FROM clases WHERE clases_id=".$del."");

	while ($cuni = mysqli_fetch_array($getUnidad)){
	
	$file_unidad = $cuni['clases_unidad'];
	
	$delVideos = mysqli_query($con, "DELETE FROM video_embeds WHERE unidad_id=".$file_unidad."");
	
	
	$find_files = mysqli_query($con,"SELECT file_name,file_type FROM clase_files WHERE file_unidad=".$file_unidad."");
	
	mysqli_num_rows($find_files);
	
	
	
		while($files = mysqli_fetch_array($find_files)){
			
			echo $fileNamex = $files['file_name'];
			echo $ft = $files['file_type']; 
			
				if($ft == 'p'){
				unlink('../activity_files/clase/presentacion/'.$fileNamex.'');
				$delClass_p = mysqli_query($con, "DELETE FROM clase_files WHERE file_name='".$fileNamex."'");
					if($delClass_p){
					echo 'Presentacions Deleted';
					}else{
					echo 'failed';
					}
				}
				
				if($ft == 'l'){
				unlink('../activity_files/clase/lectura/'.$fileNamex.'');
				$delClass_l = mysqli_query($con, "DELETE FROM clase_files WHERE file_name='".$fileNamex."'");
				if($delClass_l){
					echo 'Lecturas Deleted';
					}else{
					echo 'failed';
					}
			
					
				}
				
				if($ft == 'a'){
				unlink('../activity_files/clase/actividad/'.$fileNamex.'');
				
				$del_activity_files = mysqli_query($con, "DELETE FROM clase_files WHERE file_name='".$fileNamex."'");
				if($del_activity_files){
					echo 'Lecturas Deleted';
					}else{
					echo 'failed';
					}
				
				$del_activity_register = mysqli_query($con, "DELETE FROM actividades_activos WHERE clase_id='".$del."'");
					
					
					
				}
				
		}
	

	
	$activity_file = $cuni['clases_activity_file']; 
	unlink('../activity_files/clase/'.$activity_file.'');
	$DELCLASE = mysqli_query($con, "DELETE FROM clases WHERE clases_id=".$del."");
	


}

//header('Location:http://leavirtual.com.mx/actividades/clase.php');

//exit;