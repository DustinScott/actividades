<div class="large-12 columns">
	<hr />
	<div class="large-6 columns">
<h2>Temarios Registrados </h2>
</div>

	<div class="large-6 columns">
		
		
		
<a data-reveal-id="myModal" class="right" href="" style="font-size:20px;"><i class="fa fa-plus-square-o fa-lg" aria-hidden="true"></i> </a>
</div>

<table>
  <thead>
    <tr>
<!-- <th>unidad_id</th> -->
<th>#</th>
<th>Titulo</th>
<th>Proposito</th>
<th>Desempeno</th>
<th>Temario</th>
<th>Numero</th>
<th>Modulo</th>
<th>Cuatrimestre</th>
<th><i class="fa fa-pencil" aria-hidden="true"></i></th>      
    </tr>
  </thead>
  <tbody>
    
   <?php 
	   
	   $get_termarios = mysqli_query($con,"SELECT * FROM unidades");
	   
	   while($tems = mysqli_fetch_array($get_termarios)){
		   
		   
		   echo '
		   	

		   <tr>
		   
		   
		    
			<td>'.$tems['unidad_num'].'</td>
			<td>'.$tems['unidad_titulo'].'</td>
			<td>'.$tems['unidad_proposito'].'</td>
			<td>'.$tems['unidad_desempeno'].'</td>
			<td>'.$tems['unidad_temario'].'</td>
			<td>'.$tems['materia_numero'].'</td>
			<td>'.$tems['modulo_numero'].'</td>
			<td>'.$tems['cuatrimestre_numero'].'</td>
		    <td><i class="fa fa-pencil" aria-hidden="true"></i></td>
		   </tr>
		   
		   ';
		   
	   }
	   
	   
   ?>
    
    
    
    
   </tbody>
</table>
</div>