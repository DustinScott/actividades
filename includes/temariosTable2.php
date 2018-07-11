<div class="large-12 columns">
	<hr />
	<div class="large-6 columns" style="padding-left:0px;">
<h3 style="padding-left:0px; color:rgb(200,110,223);">Temarios Registrados </h3>
</div>

<div class="large-6 columns">

<a data-reveal-id="myModal" class="right" href="" style="font-size:20px;"><i class="fa fa-plus-square-o fa-lg" aria-hidden="true"></i> </a>
</div>

<form id="sendparent_withdata" action="et.php" method="post">
   <input id="sendparent" type="hidden" name="parent" value="">
	   
   </form>



<hr / style="border:0px;">

<table id="table_id">
  <thead>
    <tr>
<!-- <th>unidad_id</th> -->

<th>Titulo</th>
<!--
<th>Proposito</th>
<th>Desempeno</th>
<th>Temario</th>
-->
<th>Materia</th>
<!--
<th>Unidad</th>
<th>Modulo</th>
<th>Cuat.</th>
-->
<th><i class="fa fa-eye fa-lg" aria-hidden="true"></i></th>    
<th><i class="fa fa-pencil" aria-hidden="true"></i></th>  
    </tr>
  </thead>
  <tbody>
    
   <?php 
	   mysqli_set_charset( $con, 'utf8');
	   $get_termarios = mysqli_query($con,"SELECT 	unidades.unidad_id,	
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
	   RIGHT JOIN materias ON  unidades.materia_numero = materias.materia_id");
	   
	   
	   while($tems = mysqli_fetch_array($get_termarios)){
		   
		   
		   echo '
		   	

		   <tr id="'.$tems['unidad_id'].'" class="trunidad">
		   
			<td class="uN_titulo">'.$tems['unidad_titulo'].'</td>
			<td class="mT_nombre">'.$tems['materia_nombre'].'</td>
			
			
		    <td class="view_dataUni"><a href="#" ><i class="fa fa-eye" aria-hidden="true"></i></a></td>
		    <td class="get_dataUni"><a href="#"><i class="fa fa-pencil" aria-hidden="true"></i></a></td>
		    
		   </tr>
		   
		  
		   
<div id="additional_'.$tems['unidad_id'].'" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
   
	<div class="large-6 columns">
	  <h2 id="modalTitle">'.$tems['materia_nombre'].'</h2>  
		</div>
	
		<div class="large-2 columns">
		  <h2 id="modalTitle" class="button secondary tiny radius">Unidad '.$tems['unidad_num'].'</h2>
			</div>
	
	  		<div class="large-2 columns">
	  		  <h2 id="modalTitle" class="button secondary tiny radius">Modulo '.$tems['modulo_num'].'</h2>
		  		</div>
	
	  			<div class="large-2 columns">
	  			   <h2 id="modalTitle" class="button secondary tiny radius">Cuatrimestre '.$tems['cuatrimestre_num'].'</h2>
	  				 </div>
	
	  				<hr />
	
				 	  <div class="large-12 columns">
				 	  	<h5 id="modalTitle">'.$tems['unidad_titulo'].'</h5><hr />  
						  	</div>
	
							<div class="large-6 columns">
							  <h4><i class="fa fa-eercast" aria-hidden="true"></i> Proposito</h4>
							  '.$tems['unidad_proposito'].' 
							 	 <hr />
						    	 <h4><i class="fa fa-eercast" aria-hidden="true"></i> Desempeño</h4>
						     		'.$tems['unidad_desempeno'].'	 
						  	    	</div>
		
									  <div class="large-6 columns">
								  		<h4><i class="fa fa-eercast" aria-hidden="true"></i> Temario</h4>'.$tems['unidad_temario'].' 
		 						  		  </div>
		
		 						  		  <div class="large-12 columns" id="'.$tems['unidad_id'].'"><hr />
										    <a href="#" class="get_dataUni"><i class="fa fa-pencil" aria-hidden="true"></i></a>
										   	  </div>

										   	   <a class="close-reveal-modal" aria-label="Close">&#215;</a>
       									   	   	 </div>';
		   
	   }
	   
	   
   ?>

  </tbody>
   
   
</table>
</div>
   
   
  
   
   <?php include 'includes/editTemario.php'; ?>
      
    
 