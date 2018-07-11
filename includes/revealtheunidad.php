<?php include 'ewp.php';
	
	 $parent = $_POST['parent'];
			   
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
			   WHERE unidad_id=$parent");
			   
			   
		     
			   
		        while($tems = mysqli_fetch_array($getTEMS)){
	
  				echo '
				 	  <div class="large-12 columns ">
				 	  	<h5 id="modalTitle">Titulo: - '.$tems['unidad_titulo'].'</h5><hr />  
						  	</div>
	
							<div class="large-12 columns">
							  <h5><i class="fa fa-eercast" aria-hidden="true"></i> Propósito</h5>
							  <div class="unidad_text">'.$tems['unidad_proposito'].'</div> 
							 	 </div>
							 	 
						    	<div class="large-12 columns">	 
							    	 <h5><i class="fa fa-eercast" aria-hidden="true"></i> Desempeño</h5>
							     		<div class="unidad_text">'.$tems['unidad_desempeno'].'</div> 	 
								 		</div>
		
									  <div class="large-12 columns">
								  		<h5><i class="fa fa-eercast" aria-hidden="true"></i> Temario</h5>
								  		<div class="unidad_text">'.$tems['unidad_temario'].' </div> 
		 						  		  </div>
		
		 						  		   	  	</div>';
										   	  	
										   	  	
	}
       									   	   	 ?>