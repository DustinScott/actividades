<?php include '../includes/ewp.php';
	
	$u = $_FILES['updatefile'];
	$dl = $_FILES['d_updatefile'];
	$wFile = $_POST['wFile'];
	$row = $_POST['row']; // GET the image from here
	$curFile = $_POST['curFile'];
	$plantillaX = $_POST['plantillaX'];
	

		
	$queryClases = mysqli_query($con, "SELECT 
									  c.clases_unidad,u.unidad_id,u.unidad_num 
									  FROM clases AS c,unidades AS u 
									  WHERE c.clases_id=$row AND c.clases_unidad = u.unidad_id");
		
	while($d = mysqli_fetch_array($queryClases)){
		$file_unidad = $d['clases_unidad'];
		$d['unidad_num'];
		echo $filename =  $nm_x;
		
		
		
		if(!empty($plantillaX)){
		
				$update_plantillaX = mysqli_query($con,"UPDATE clase_files SET plantilla='".$plantillaX."' 
													     WHERE file_name='".$curFile."' 
															   AND file_unidad=".$file_unidad."");
				
				if($update_plantillaX){
					echo 'success plantilla is up';
				}else{
					echo 'failed	';
				}
		}

	}
	
	//header('Location:http://leavirtual.com.mx/actividades/clase.php?updated='.$nm_x.'');

	
	
?>