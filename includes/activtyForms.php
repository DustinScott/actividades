<?php include 'ewp.php';
	
	
	
	$activity = $_POST['change']; 
	
	
	
	$activtyName = '';
	mysqli_set_charset( $con, 'utf8');
	$query = mysqli_query($con,"SELECT * FROM actividades WHERE actividad_id = ".$activity."");
		while($a = mysqli_fetch_array($query)){
		
		$activtyName .= $a['actividad_name'];
		echo '<div class="large-12 columns"><h6>Detalles de '.$activtyName.'</h6></div>';	
		}
	 echo 'hola'; 
	function label($size,$textInput,$nameInput,$placeholder){
		echo '<div class="large-4 columns" >
		<label style="font-size:'.$size.'px;">'.$textInput.'</label>
		<input type="text" name="'.$nameInput.'" placeholder="'.$placeholder.'">
		</div>';
	}
	
	

	
	
	
?>