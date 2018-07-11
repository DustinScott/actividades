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
	
	
	if($activity == 1){
		
	echo '<div class="large-4 columns" >';	
echo '<input type="text" name="NA" placeholder="Título" style ="width:23rem;">';
	echo '</label>';
	echo '</div>';	 
	echo '<hr />';
	echo '</label>';
	echo '</div>';
	echo ' <input type="file" name="F_AFA" multiple="true"  style="margin-left:1rem;">';
	echo '<hr />';

	}
	
	
	
	elseif($activity == 2){
		
	echo '<div class="large-4 columns" >';	
    echo '<input type="text" name ="NA" placeholder ="Título" style ="width:23rem;">';
	echo '</label>';
	echo '</div>';	 
	echo '<hr />';
	echo '</label>';
	echo '</div>';	
	 echo ' <input type="file" name="F_AFA" multiple="true" style="margin-left:1rem;">';
	 echo '<hr />';
	}
	
	
	elseif($activity == 4){
		
	echo '<div class="large-4 columns" >';	
	echo '<input type="text" name ="NA" placeholder ="Título" style ="width:23rem;">';
	echo '</label>';
	echo '</div>';	 
	echo '<hr />';
	echo '</label>';
	echo '</div>';	
	echo ' <input type="file" name="F_AFA" multiple="true" style="margin-left:1rem;">';
	 echo '<hr />';
	}
	
	
	elseif($activity == 5){
		
	echo '<div class="large-4 columns" >';	
echo '<input type="text" name ="NA" placeholder ="Título" style ="width:23rem;">';
	echo '</label>';
	echo '</div>';	 
	echo '<hr />';
	echo '</label>';
	echo '</div>';
	echo ' <input type="file" name="F_AFA" multiple="true"  style="margin-left:1rem;">';
	echo '<hr />'; 
	}
	
	
	elseif($activity == 6){
		
	echo '<div class="large-4 columns" >';	
	echo '<input type="text" name ="NA" placeholder ="Título" style ="width:23rem;">';
	echo '</label>';
	echo '</div>';	 
	echo '<hr />';
	echo '</label>';
	echo '</div>'; 
	echo ' <input type="file" name="F_AFA" multiple="true" style="margin-left:1rem;">';
     echo '<hr />';
	 
	}
	
	
	elseif($activity == 7){
		
	echo '<div class="large-4 columns" >';	
	echo '<input type="text" name ="NA" placeholder ="Título" style ="width:23rem;">';
	echo '</label>';
	echo '</div>';	 
	echo ' <input type="file" name="F_AFA" multiple="true"  style="margin-left:1rem;">';
	echo '<hr />';	
		
	 
	}
	
	
	elseif($activity == 9){
		
	echo '<div class="large-4 columns" >';	
	echo '<input type="text" name ="NA" placeholder ="Título" style ="width:23rem;">';
	echo '</label>';
	echo '</div>'; 
	echo ' <input type="file" name="F_AFA" multiple="true"  style="margin-left:1rem;">';
	echo '<hr />';
	 
	}
	
	
	
	elseif($activity == 10){
		
	echo '<div class="large-4 columns" >';	
	echo '<input type="text" name ="NA" placeholder ="Título" style ="width:23rem;">';
	echo '</label>';
	echo '</div>';	 
	echo '<hr />';
	echo '</label>';
	echo '</div>';
	echo ' <input type="file" name="F_AFA" multiple="true"  style="margin-left:1rem;">';
	echo '<hr />';
	 
	}
	

	elseif($activity == 11){
		
	echo '<div class="large-4 columns" >';	
	echo '<input type="text" name ="NA" placeholder ="Título" style ="width:23rem;">';
	echo '</label>';
	echo '</div>';	 
	echo '<hr />';
	echo '</label>';
	echo '</div>';
	echo ' <input type="file" name="F_AFA" multiple="true" style="margin-left:1rem;">';
	echo '<hr />'; 
	}
	
	//Linea_del_Tiempo
	elseif($activity == 12){
		
	echo '<input type="text" name ="NA" placeholder ="Título" style ="width:23rem;">';
	echo '</label>';
	echo '</div>';	 
	echo '<hr />';
	echo '</label>';
	echo '</div>';
	echo ' <input type="file" name="F_AFA" multiple="true" style="margin-left:1rem;">';
	echo '<hr />';
	 
	}
	
	//Triptico
	elseif($activity == 13){
		
	echo '<div class="large-4 columns" >';	
	echo '<input type="text" name ="NA" placeholder ="Título" style ="width:23rem;">';
	echo '</label>';
	echo '</div>';	 
	echo '<hr />';
	echo '</label>';
	echo '</div>';	
	echo ' <input type="file" name="F_AFA" multiple="true"  style="margin-left:1rem;">';
	echo '<hr />';
	 
	}
	//Dipticos
	elseif($activity == 14){
		
	echo '<input type="text" name ="NA" placeholder ="Título" style ="width:23rem;">';
	echo '</label>';
	echo '</div>';	 
	echo '<hr />';
	echo '</label>';
	echo '</div>';
	echo ' <input type="file" name="F_AFA" multiple="true"  style="margin-left:1rem;">';
	 echo '<hr />';
	}
	
	//Audios
	elseif($activity == 15){
		
	echo '<div class="large-4 columns" >';	
	echo '<input type="text" name ="NA" placeholder ="Título" style ="width:23rem;">';
	echo '</label>';
	echo '</div>';	 
	echo '<hr />';
	echo '</label>';
	echo '</div>';
	echo ' <input type="file" name="F_AFA" multiple="true" style="margin-left:1rem;">';
	echo '<hr />';
	 
	}
	//Video
	elseif($activity == 16){
	
	echo '<div class="large-4 columns" >';	
	echo '<input type="text" name ="NA" placeholder ="Título" style ="width:23rem;">';
	echo '</label>';
	echo '</div>';	 
	echo '<hr />';
	echo '</label>';
	echo '</div>';
	echo ' <input type="file" name="F_AFA" multiple="true"  style="margin-left:1rem;">';
	echo '<hr />';
		
	 
	}
	//Exposiciones_virtuales
	elseif($activity == 17){
		
    echo '<div class="large-4 columns" >';	
	echo '<input type="text" name ="NA" placeholder ="Título" style ="width:23rem;">';
	echo '</label>';
	echo '</div>';	 
	echo '<hr />';
	echo '</label>';
	echo '</div>';
	echo ' <input type="file" name="F_AFA" multiple="true"  style="margin-left:1rem;">';
	echo '<hr />';	
	 
	}
	//Presentaciones
	elseif($activity == 18){
		
	echo '<div class="large-4 columns" >';	
	echo '<input type="text" name ="NA" placeholder ="Título" style ="width:23rem;">';
	echo '</label>';
	echo '</div>';	 
	echo '<hr />';
	echo '</label>';
	echo '</div>';	 
	echo ' <input type="file" name="F_AFA" multiple="true"  style="margin-left:1rem;">';
	echo '<hr />';
	 
	}
	//Graficas 
	elseif($activity == 19){
		
	echo '<div class="large-4 columns" >';	
	echo '<input type="text" name ="NA" placeholder ="Título" style ="width:23rem;">';
	echo '</label>';
	echo '</div>';	 
	echo '<hr />';
	echo '</label>';
	echo '</div>'; 
	echo ' <input type="file" name="F_AFA" multiple="true" style="margin-left:1rem;">';
	echo '<hr />';
	 
	}
	//Tablas
	elseif($activity == 20){
		
    echo '<div class="large-4 columns" >';	
	echo '<input type="text" name ="NA" placeholder ="Título" style ="width:23rem;">';
	echo '</label>';
	echo '</div>';	 
	echo '<hr />';
	echo '</label>';
	echo '</div>';
	echo ' <input type="file" name="F_AFA" multiple="true" style="margin-left:1rem;">';
	echo '<hr />';
		
	 
	}
	//Completar textos
	elseif($activity == 21){
		
    echo '<div class="large-4 columns" >';	
	echo '<input type="text" name ="NA" placeholder ="Título" style ="width:23rem;">';
	echo '</label>';
	echo '</div>';	 
	echo '<hr />';
	echo '</label>';
	echo '</div>';	
    echo ' <input type="file" name="F_AFA" multiple="true"  style="margin-left:1rem;">';
	echo '<hr />';
	
	}
	//Cuadro comparativo
	elseif($activity == 22){
		
    echo '<div class="large-4 columns" >';	
	echo '<input type="text" name ="NA" placeholder ="Título" style ="width:23rem;">';
	echo '</label>';
	echo '</div>';	 
	echo '<hr />';
	echo '</label>';
	echo '</div>';	
	echo ' <input type="file" name="F_AFA" multiple="true" style="margin-left:1rem;">';
	echo '<hr />';	
	 
	}
	//Éxamen
	elseif($activity == 23){
		
	echo '<div class="large-4 columns" >';	
	echo '<input type="text" name ="NA" placeholder ="Título" style ="width:23rem;">';
	echo '</label>';
	echo '</div>';	 
	echo '<hr />';
	echo '</label>';
	echo '</div>';
	echo ' <input type="file" name="F_AFA" multiple="true"  style="margin-left:1rem;">';
	 echo '<hr />';
	 
	}
	 //Taller
	elseif($activity == 24){
		
	echo '<div class="large-4 columns" >';	
	echo '<input type="text" name ="NA" placeholder ="Título" style ="width:23rem;">';
	echo '</label>';
	echo '</div>';	 
	echo '<hr />';
	echo '</label>';
	echo '</div>';
	echo ' <input type="file" name="F_AFA" multiple="true" style="margin-left:1rem;">';
	
	echo '<hr />';
	}
	
	elseif($activity == 25){//Ensayo
		
	echo '<div class="large-4 columns" >';	
	echo '<input type="text" name ="NA" placeholder ="Título" style ="width:23rem;">';
	echo '</label>';
	echo '</div>';	 
	echo '</label>';
	echo '</div>'; 
	echo ' <input type="file" name="F_AFA" multiple="true"  style="margin-left:1rem;">';
	
	echo '<hr />';
	
	 
	}
	
	
	
?>