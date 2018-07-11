<?php include 'ewp.php';
	
	echo $clase_id = $_POST['clase_id'];
	
	// Find the Class
	$cm = ''; // Prepare the Global $cm = class material
	$cu = ''; // Prepare the Global $cu = class unidad
	
	$cg = mysqli_query($con,"SELECT * FROM clases WHERE clases_id='".$clase_id."'");
	
	while($cl = mysqli_fetch_array($cg)){
	 	$cm .= $cl['clases_material'];
	 	$cu .= $cl['clases_unidad'];
	}
	
	
	$file_name = $_FILES['file']['name'];
	$ext = pathinfo($file_name, PATHINFO_EXTENSION);
	
	// this section uses the FILE EXTENSION to differenciate between Lectura's and Powerpoint Presentations
	if($ext == 'ppt' || $ext == 'pptx' || $ext == 'PPT' || $ext == 'PPTX' || $ext == 'ppsx'|| $ext == 'PPSX'){
		
		$ext = 'p';
		$folder = 'presentacion';
	}else{
		
		$ext = 'l';
		$folder = 'lectura';
	}
	
	//Get the temp file path
    $tmpFilePath = $_FILES['file']['tmp_name'];
	  
	//Make sure we have a filepath
	if ($tmpFilePath != ""){
	  
	//Setup our new file path
	$newFilePath = "../activity_files/clase/".$folder."/".$file_name."" ;
	
	//Upload the file into the temp dir
	if(move_uploaded_file($tmpFilePath, $newFilePath)) {
	
	$uploadL = mysqli_query($con, "INSERT INTO clase_files(clase_id,file_type,file_name,file_material,file_unidad) VALUES('$clase_id','$ext','$file_name','$cm','$cu')");
	
	}
	}
?>