mysqli_set_charset( $con, 'utf8');
			   $get_materiasNAV = mysqli_query($con,"SELECT unidades.unidad_id,	
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
			   
			   ORDER BY materias.materia_nombre DESC 
			   
			   ");
			   
			   if($get_materiasNAV){
				   echo 'yes';
			   }else{
				   echo 'no	';
			   }
		     
			   echo ' <select class="chooseunidad">';
		        while($mat_selNAV = mysqli_fetch_array($get_materiasNAV)){
			
				echo '<option value="'.$mat_selNAV['unidad_id'].'">'.$mat_selNAV['materia_nombre'].'</option>';
				
				}
				
				echo '</select>';