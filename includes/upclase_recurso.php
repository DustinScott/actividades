<?php include 'ewp.php';
	
	
	// 	A=Activity F_= File F=Form M=Mataria U=Unidad V=Video 
	
	// Activity Material, Unidad, Video
	 '<h2>Maestro</h2> <br />';
	 $CUR_M = $_POST["cur_maestro"];
	 if(empty($CUR_M)){
		 echo 'empty';
	 }
	 '<hr />';
	 '<h2>Material</h2> <br />';
	 $AFM = $_POST["AFM"];
	 '<hr />';
	 '<br />';
	 '<h2>Unidad</h2><br />';
	 $AFU = $_POST["AFU"];
	 '<hr />';
	
	// ACTIVITY + HERRAMIENTA Chosen
	 '<br />';
	 '<h2>Actividad</h2><br />';
	 $AFA = $_POST["AFA"];
	 '<hr />';
	 '<br />';
	 '<h2>Herramienta</h2><br />';
	 $AFH = $_POST["AFH"];
	 '<hr />';
	 '<br />';
	 '<h2>Video</h2><br />';
	 $AFV_one = $_POST["AFV_one"];
	 $AFV_two = $_POST["AFV_two"];
	 $AFV_three = $_POST["AFV_three"];

	 '<hr />';
	
	// 	CLASE
	$F_AFA = $_FILES["F_AFA"];
	$F_AFL = $_FILES["F_AFL"];
	$F_AFP = $_FILES["F_AFP"];
	
	//ARCHIVOS DE HERRAMIENTAS 
	$F_AFH_AI = $_FILES["F_AFH_AI"];
    $F_AFH_IX = $_FILES["F_AFH_IX"];
	$F_AFH_AT = $_FILES["F_AFH_AT"];
	
	// TEXT EDITOR
	$AIS = $_POST['AIS'];
	$NA = $_POST['NA'];//Guarda el nombre de la actividad
	
	//Multiple File Uploader
	include 'multiUploader.php';

	if(!empty($F_AFA)){
			
	$tmp_name_fa = $_FILES["F_AFA"]["tmp_name"];
	$img_name_fa = $_FILES["F_AFA"]["name"];
	$input = $img_name_fa; // UTF8 encoded
	$input = iconv('UTF-8', 'ASCII//TRANSLIT', $input);
	$img_name_fa = preg_replace('/[^a-zA-Z0-9.]/', '_', $input);
	$upload_fa = move_uploaded_file($_FILES["F_AFA"]["tmp_name"], "../activity_files/clase/" . $img_name_fa);
			
	}
	
	if(!empty($F_AFH_AI)){//Arrastrar imagen 
			
	$tmp_name_ai = $_FILES["F_AFH_AI"]["tmp_name"];
	$img_name_ai = $_FILES["F_AFH_AI"]["name"];
	$input = $img_name_ai; // UTF8 encoded
	$input = iconv('UTF-8', 'ASCII//TRANSLIT', $input);
	$img_name_ia = preg_replace('/[^a-zA-Z0-9.]/', '_', $input);
	$upload_ai = move_uploaded_file($_FILES["F_AFH_AI"]["tmp_name"], "../activity_files/clase/" . $img_name_ai);
			
	}
	
	if(!empty($F_AFH_IX)){//Arrastrar Marcadores 
			
	$tmp_name_IX = $_FILES["F_AFH_IX"]["tmp_name"];
	$img_name_IX = $_FILES["F_AFH_IX"]["name"];
	$input = $img_name_IX; // UTF8 encoded
	$input = iconv('UTF-8', 'ASCII//TRANSLIT', $input);
	$img_name_IX = preg_replace('/[^a-zA-Z0-9.]/', '_', $input);
	$upload_IX = move_uploaded_file($_FILES["F_AFH_IX"]["tmp_name"], "../activity_files/clase/" . $img_name_IX);
			
	}
	
	if(!empty($F_AFH_AT)){//Arrastra texto 
			
	$tmp_name_AT = $_FILES["F_AFH_AT"]["tmp_name"];
	$img_name_AT = $_FILES["F_AFH_AT"]["name"];
	$input = $img_name_AT; // UTF8 encoded
	$input = iconv('UTF-8', 'ASCII//TRANSLIT', $input);
	$img_name_AT = preg_replace('/[^a-zA-Z0-9.]/', '_', $input);
	$upload_AT = move_uploaded_file($_FILES["F_AFH_AT"]["tmp_name"], "../activity_files/clase/" . $img_name_AT);		
	}
	
	

	if($upload_fa){
		 '<br />';
		 'Activity File is Up';
		 '<hr />';
	}
	
	//mysqli_set_charset('utf8');
	$queryClase = mysqli_query($con,"INSERT INTO clases(clases_maestro,clases_material, clases_unidad, clases_actividad, clases_herramienta, clases_video_one,clases_video_two,clases_video_three, clases_instructions,clases_activity_file,clases_AI,clases_IX,clases_AT,clases_NA) VALUES ('$CUR_M','$AFM','$AFU','$AFA','$AFH','$AFV_one','$AFV_two','$AFV_three','$AIS','$img_name_fa','$img_name_ai','$img_name_IX','$img_name_AT','$NA')");
	

	if($queryClase){
		//echo 'test';
		echo mysqli_error($con);
	}else{
		echo 'going';
		echo '<br />';
		echo mysqli_error($con);
	}

	
$url = '../index.php';
		echo '<META HTTP-EQUIV=Refresh CONTENT="0; URL='.$url.'">';	

?>