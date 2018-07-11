<?php include 'ewp.php';
	
	
	
	  $parent = $_POST['parent'];
	   
	 //echo 'I\'m Back';
			   
			   mysqli_set_charset( $con, 'utf8');
			   $getTEMS = mysqli_query($con,"SELECT unidades.unidad_id,	
			   unidades.unidad_num,
			   unidades.unidad_titulo,
			   unidades.unidad_proposito,
			   unidades.unidad_desempeno,
			   unidades.unidad_temario,
			   unidades.materia_numero,
			   materias.cuatrimestre_num,	   
			   materias.materia_nombre,
			   materias.modulo_num,
			   materias.materia_id 
			   FROM unidades
			   RIGHT JOIN materias ON  unidades.materia_numero = materias.materia_id
			   
			   WHERE materia_numero=$parent
			   
			   ORDER BY unidad_num
			   ");
			  
			  
			  
			   echo 'Selecione su Unidad';	
			   // SENDS THE UNINDAD
			   echo '<select id="selUniGrap" class="chooseunidad" name="AFU">';
			   echo '<option selected="true" disabled="disabled">Unidades</option> ';			   
		       while($tems = mysqli_fetch_array($getTEMS)){
			       
			     
			       
			       echo '<h3>'.$tems['unidad_num'].'</h3>';
 
			       echo '<option value="'.$tems['unidad_id'].'">'.$tems['unidad_num'].'</option>';
	
			   }
			   
			 
			  
			  echo '</select>';
			  
			 
			  
			  
       							
       							
       									   	   	 

?>