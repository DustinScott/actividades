<?php include 'ewp.php';
	
	$file_type = $_POST['file_type'];
	$clase_id  = $_POST['clase_id'];
	$random_id = $_POST['random_id'];
	
	$getClase = mysqli_query($con,"SELECT * FROM clases WHERE clases_id='".$clase_id."'");
	
	while($mu = mysqli_fetch_array($getClase)){
	
	    $materia = $mu['clases_material'];
		$unidad = $mu['clases_unidad'];
	
		if(!empty($_FILES['file'])){
			
		$l_fN = $_FILES['file']['name'];	
		 
		$uploadL = mysqli_query($con, "INSERT INTO clase_files(clase_id,file_name,file_type,file_material,file_unidad,random_id)VALUES('".$clase_id."','".$l_fN."','".$file_type."','".$materia."','".$unidad."',".$random_id.")");
		
		//Make sure we have a filepath
		
				  $tmpFilePath = $_FILES['file']['tmp_name'];
				 
				  if ($tmpFilePath != ""){
				  
				  //Setup our new file path
				  $newFilePath = "../activity_files/clase/actividad/".$l_fN."" ;
				
				  //Upload the file into the temp dir
				  move_uploaded_file($tmpFilePath, $newFilePath);
		
				  }
		}
		
	}
	
	
?>