<?php include '../includes/ewp.php';
	
	$u = $_FILES['updatefile'];
	$dl = $_FILES['d_updatefile'];
	$wFile = $_POST['wFile'];
	
	$row = $_POST['row']; // GET the image from here
	$curFile = $_POST['curFile'];
	$plantillaX = $_POST['plantillaX'];
	$planTX = mysqli_real_escape_string($con,$plantillaX);
	
	if(empty($plantillaX)){
	
			$nm_x = '';
				
			if(!empty($u)){
					
					$tmp = $u["tmp_name"];
					$nm = $u["name"];
					$ip = $nm; // UTF8 encoded
					$ip = iconv('UTF-8', 'ASCII//TRANSLIT', $ip);
					$nm = preg_replace('/[^a-zA-Z0-9.]/', '_', $ip);
					$nm_x .= $nm;
					$upload_fa = move_uploaded_file($tmp, "../activity_files/clase/".$wFile."/".$nm_x);
					if($upload_fa){
						echo 'File Uploaded Successfully';
					}
					
					
			}
	}
		
	$queryClases = mysqli_query($con, "SELECT 
									  c.clases_unidad,u.unidad_id,u.unidad_num 
									  FROM clases AS c,unidades AS u 
									  WHERE c.clases_id=$row AND c.clases_unidad = u.unidad_id");
		
	while($d = mysqli_fetch_array($queryClases)){
		$file_unidad = $d['clases_unidad'];
		
		
		
		if(empty($plantillaX)){
			if(!empty($u)){
				
					$nmx = $u["name"];
					$ipx = $nmx; // UTF8 encoded
					$ipx = iconv('UTF-8', 'ASCII//TRANSLIT', $ipx);
					$nmx = preg_replace('/[^a-zA-Z0-9.]/', '_', $ipx);
			
					$update_clase_files = mysqli_query($con,'UPDATE clase_files SET file_name="'.$nmx.'" 
														     WHERE file_name="'.$curFile.'" 
																   AND file_unidad="'.$file_unidad.'"');
					
					if($update_clase_files){
						//echo 'success';
					}
			}
		}elseif(!empty($plantillaX)){
			echo 'Hello';
					if($wFile == 'presentacion'){
					echo $ftype = 'p';	
					}elseif($wFile == 'lectura'){
					echo $ftype = 'l';	
					}else{
					$ftype = $wFile;	
					}
					
					
					$update_plantillas = mysqli_query($con,"UPDATE clase_files SET plantilla='".$planTX."' 
														    WHERE file_name='".$curFile."' 
														    AND file_type='".$ftype."' AND file_unidad=".$file_unidad."");
					
					if($update_plantillas){
						echo 'success with the plantillas';
						echo mysqli_error($con);
					}else{
						echo 'failure';
						echo '<br />';
						echo mysqli_error($con);
					}
		}
	}
	
	//header('Location:http://leavirtual.com.mx/actividades/clase.php?updated='.$nm_x.'');

	
	
?>