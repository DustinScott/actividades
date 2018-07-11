<?php include 'ewp.php';
	
	echo $clase_id = $_POST['class_id_multi_upload'];
	
	
	// Finde the Class
	$cm = ''; // Prepare the Global $cm = class material
	$cu = ''; // Prepare the Global $cu = class unidad
	
	$cg = mysqli_query($con,"SELECT * FROM clases WHERE clases_id='".$clase_id."'");
	
	while($cl = mysqli_fetch_array($cg)){
	 	$cm .= $cl['clases_material'];
	 	$cu .= $cl['clases_unidad'];
	}
	
	
if((!empty($cm)) && (!empty($cu))){	
	
	if(!empty($_FILES['F_AFL'])){
			//$files = array_filter($_FILES['upload']['name']); something like that to be used before processing files.
			// Count # of uploaded files in array
			$total_l = count($_FILES['F_AFL']['name']);
			
			// Loop through each file
			for($i=0; $i<$total_l; $i++) {
			  //Get the temp file path
			  $tmpFilePath = $_FILES['F_AFL']['tmp_name'][$i];
			  $l_fN = $_FILES['F_AFL']['name'][$i];
			  
			  //Make sure we have a filepath
			  if ($tmpFilePath != ""){
			  
			  //Setup our new file path
			  $newFilePath = "../activity_files/clase/lectura/".$l_fN."" ;
			
			  //Upload the file into the temp dir
			  if(move_uploaded_file($tmpFilePath, $newFilePath)) {
			  
			  $uploadL = mysqli_query($con, "INSERT INTO clase_files(file_type,file_name,file_material,file_unidad) VALUES('l','$l_fN','$cm','$cu')");
			  //Handle other code here
			  
			 
			    }
			  }
			}
	} // CLOSE BRACKET OF THE  "if(!empty($_FILES['F_AFL']))"
	

	
	if(!empty($_FILES['F_AFP'])){
			//$files = array_filter($_FILES['upload']['name']); something like that to be used before processing files.
			// Count # of uploaded files in array
			$total_p = count($_FILES['F_AFP']['name']);
			
			// Loop through each file
			for($i=0; $i<$total_p; $i++) {
			  //Get the temp file path
			  $tmpFilePath = $_FILES['F_AFP']['tmp_name'][$i];
			  $p_fN = $_FILES['F_AFP']['name'][$i];
			  
			  //Make sure we have a filepath
			  if ($tmpFilePath != ""){
			  
			  //Setup our new file path
			  $newFilePath = "../activity_files/clase/presentacion/".$p_fN."" ;
			
			  //Upload the file into the temp dir
			  if(move_uploaded_file($tmpFilePath, $newFilePath)) {
			  
			  $uploadP = mysqli_query($con, "INSERT INTO clase_files(file_type,file_name,file_material,file_unidad) VALUES('p','$p_fN','$cm','$cu')");
			  //Handle other code here

			
			    }
			  }
			}
	} // CLOSE BRACKET OF THE  "if(!empty($_FILES['F_AFP']))"
}

header('Location: http://leavirtual.com.mx/actividades/master_class_s.php?cid_return='.$clase_id.'');

?>