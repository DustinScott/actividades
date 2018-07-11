<?php include 'ewp.php';
	
	echo '<hr />';
	echo '<br />';
	echo '<h6>Lista de Clases</h6>';
	$matId = ''; 
	// $wer = where is this person allowed to go	
	$wer =  $_SESSION['maestros_id']; 
	$rolly = $_SESSION['role'];
	mysqli_set_charset( $con, 'utf8');
	
	if($rolly == 2){
	// FOR MAESTROS
	$getmethematerias = mysqli_query($con, "SELECT * FROM clases 
											WHERE clases_maestro = '$wer'");	
	}elseif($rolly == 1){
	// FOR MANAGERS
	$getmethematerias = mysqli_query($con, "SELECT * FROM clases");
	}
	
	while($c = mysqli_fetch_array($getmethematerias)){
	$integrador = $c['clase_integradora'];
	$ci = $c['clases_id'];	
	$cm = $c['clases_unidad'];
	$matId .= $c['clases_material'];
	}   
	   
	
	$num;
	$no;

	if($rolly == 2){
	// FOR MAESTROS
	$get_clase_materias = mysqli_query($con,"SELECT 
 	c.clases_material, 
    m.materia_id,m.materia_nombre,m.maestros_id
    FROM clases AS c, materias AS m
    WHERE c.clases_material = m.materia_id AND m.maestros_id = '$wer'  		   
    GROUP BY m.materia_id
  	");
  	}elseif($rolly == 1){
	// FOR MANAGERS
	$get_clase_materias = mysqli_query($con,"SELECT 
 	c.clases_material, 
    m.materia_id,m.materia_nombre
    FROM clases AS c, materias AS m
    WHERE c.clases_material = m.materia_id  		   
    GROUP BY m.materia_id
  	");
  	}

	echo '<ul class="accordion" data-accordion role="tablist">';   
	
	while($m = mysqli_fetch_array($get_clase_materias)){
	echo '<li class="accordion-navigation">
    
    <a href="#panel'.$num++.'a" class="mainSiteMenuAccordian"><div class="large-10 columns">'.$m['materia_nombre'].'</div></a>
    
    <div id="panel'.$no++.'a" class="content" style="padding:0px;">';
    					   
	$get_clase_unidades = mysqli_query($con,"SELECT 
 	c.clases_id,c.clases_unidad,c.clases_material,
 	u.unidad_id,u.unidad_num,u.unidad_titulo
    FROM clases AS c, unidades AS u
    WHERE u.unidad_id = c.clases_unidad AND
    	  
    	  c.clases_material = ".$m['materia_id']."
    	  
  	ORDER BY u.unidad_num ASC
  	");
  	
  	// Here we set variables to be used down stream when updating files
  	$unidad_selectionado = '';
  	
  	while($u = mysqli_fetch_array($get_clase_unidades)){  	
	
	echo '<a href="#" class="growl">
			 
			  <div id="'.$u['clases_id'].'" 
			  	  class="getclassdata large-12 columns" 
			  
				  style="font-size:13px;
				  		 height:60px; 
				  		 padding:20px;
				  		 color:#fff;
				  		 background:#1c7cd6;
				  		 border-bottom:1px solid #ccc;" >
				  		 
				  '.$u['unidad_num'].' - '.mb_strimwidth($u['unidad_titulo'], 0, 25, "...").'
			  
			  </div>';
			  

			  

			  
			  
		  echo '</a>';
	
		  
		  
	  	
  	}
						  	
					 	
    
	echo '</div>
	</li>'; }
	echo '</ul>';
	
	   
	
	?>
	
    
    
    <script>
      $(document).foundation();
    </script>