<?php
	
	  include 'ewp.php'; 	
	
	
	  $change = $_POST['change'];
	
	  mysqli_set_charset( $con, 'utf8');
	  $get_her = mysqli_query($con,"SELECT * FROM herramientas");
	    echo '<option selected="true" disabled="disabled">Herramientas</option>';
	    while($herr = mysqli_fetch_array($get_her)){
	         
	         //echo $herr['actividad_id'];
	         
	         //$herr['actividad_name'];
	          
	         $allof = $herr['actividad_id'];
	          
	      
	         $herrx = explode(",", $allof);
	         
	         if(in_array($change,$herrx)){
		          //echo $herrx[0];
		         
		          echo '<option value="'.$herr['herramientas_id'].'">'.$herr['herramientas_name'].'</option>';
		         
	         }
	         
	          	
	    }

	
	
	
	
	
?>