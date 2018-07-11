		<?php include '../ewp.php';
			
			$currentMaestro =  $_SESSION['maestros_id']; 
		    
		    if($_SESSION['role'] == 1){
			   
			   echo $materiaSelect = '<h6>Nuevo Clase</h6>';
			   
			   mysqli_set_charset( $con, 'utf8');
			   $getmethematerias = mysqli_query($con, "SELECT * FROM materias");
			   
		    }elseif($_SESSION['role'] == 2){
			   
			   echo $materiaSelect = '<h3 class="left">Selecione su Materia</h3>';
			   
			   mysqli_set_charset( $con, 'utf8');
			   $getmethematerias = mysqli_query($con, "SELECT * FROM materias WHERE maestros_id='$currentMaestro'");

		      }
		      // This 'input' sends the teacher
		      echo '<input type="hidden" name="cur_maestro" value="'.$currentMaestro.'">';
		      
		      // This 'SELECT' sends the Materia
		      echo '<select id="selMatGrap" class="themats" name="AFM">';
		      echo '<option selected="true" disabled="disabled">Materias Asignadas</option>';
		      while($mats = mysqli_fetch_array($getmethematerias)){
			      
			  echo '<option value="'.$mats['materia_id'].'">'.$mats['materia_nombre'].'</option>';
			      
		      }
		      
			  echo '</select>'; 
			   
			  	
					 
			  ?>
		 	  
		 
			  
		     <!--  AJAX : unidades will appear here  -->
			 <!-- SENDS THE UNINDAD -->
			  <div id="unidadesONLY"> </div>	  
 <!--  AJAX : Temarios will appear here  -->
 

<div id="moreClaseInfo" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
 <div id="showtemhere" > </div>
  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>
			  
	    </hr>
	    
	    
	 <div id="createNewClass" class="right"></div>
	 <div id="moreClassInfo" class="left"></div>
	