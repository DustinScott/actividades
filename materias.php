<?php include 'includes/head.php';?>


<?php 
	
	if($_SESSION['role'] == 2){
	
	echo '<meta http-equiv="refresh" content="0; URL=\'index.php\' " />';
	
	}elseif($_SESSION['role'] == 1){
	?>

    <div class="row">
      <div class="large-12 columns" style="">
<?php	      
			 include('includes/mainNav.php');
?>


	<hr / class="x">
	
	
	<table style="width:100%;">
  <thead>
    <tr>
      <th>Materia</th>
      <th>Modulo</th>
      <th>Cuatimestre</th>
      <th>Docente</th>
      <th class="text-center hide"><i class="fa fa-floppy-o fa-lg" aria-hidden="true"></i></th>
    </tr>
  
  </thead>
  
  
  <tbody>
	  
	<?php 
	
	mysqli_set_charset( $con, 'utf8');	
	$getMaterias = mysqli_query($con,"SELECT *
									  FROM materias");
	
	while($mats = mysqli_fetch_array($getMaterias)){		
			
	$materia_id = $mats['materia_id'];       
	$materia_nombre = $mats['materia_nombre'];
	$modulo_num	= $mats['modulo_num'];
	$cuatrimestre_num = $mats['cuatrimestre_num'];
	$maestros_id = $mats['maestros_id'];
	
    echo '<tr id="'.$materia_id.'">
    <td>'.$materia_nombre.'</td>
    <td>'.$modulo_num.'</td>
    <td>'.$cuatrimestre_num.'</td>';
  
      
    $maestros = mysqli_query($con,"SELECT * FROM maestros"); 
    
      
    echo '<td>';
    
    echo '<select class="maestrosID">';
    echo '<option selected="true" disabled="disabled">Seleciona Docente</option>';
    while($m = mysqli_fetch_array($maestros)){ 
	    
    	echo '<option id="'.$materia_id.'" class="'.$materia_nombre.'" value="'.$m['maestros_id'].'">'.$m['maestros_fname'].'</option>';
    }
    
    echo '</select></td>';
    
    echo '<td class="text-center mat_doc">
    
    <div id="doc_mat_'.$materia_id.'" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
  
  <div class="large-6 large-centered columns">
			  
			  <div class="left">
			  <h2>Confirmar Asignacion</h2>
			  </div>
			  <hr / class="x">
			  <div class="large-6 columns text-center panel"><h3>Docente</h3>
			  <div id="confirm_mat_'.$materia_id.'"></div>
			  </div>
			  
			  <div class="large-6 columns text-center panel"><h3>Materia</h3>
			  <div id="confirm_doc_'.$materia_id.'"></div>
			  </div>
			  
			  
			  <hr / class="x">
			 <div class="left">
			  <button class="button radius" id="confirm_'.$materia_id.'"><i class="fa fa-floppy-o" aria-hidden="true"></i> Guardar</button>
			  <a id="cancel_confirm_'.$materia_id.'" href="materias.php" class="button radius alert">Cancel</a> 
			 </div>
			 
			 
			 
  </div>
  
   
  
  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>
    
    </td>';
    
   
    
   
    echo '</tr>';
    }
    
    ?>


  </tbody>
</table>
	
				  
				  
	
	</div>
</div>



<?php include 'includes/footer.php'; ?>    
<?php include 'includes/pagebase.php'; }?>
