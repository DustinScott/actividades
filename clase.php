<?php include 'includes/head.php';

	if(empty($_SESSION['role'])){
	
	echo '<meta http-equiv="refresh" content="0; URL=\'login.php\' " />';
	
	}elseif(!empty($_SESSION['role'])){
		
	// $wer = where is this person allowed to go	
	$wer =  $_SESSION['maestros_id']; 	
?>

	


    <?php 
	// Set off-canvas
	include 'includes/offcanvas_TOP.php';
	
	// Determin Nav
	if($_SESSION['role'] == 1){
		 $nav =  'mainNav.php';
	}elseif($_SESSION['role'] == 2){
		 $nav =  'mainNav_Simple.php';
	}elseif(empty($_SESSION['role'])){
		include 'includes/mainNav_Simple.php';
	}
	
	include 'includes/'.$nav.'';
	
	
	
	?>
	
	

	<div class="large-3 medium-3 small-12 columns">
	<br />
<!--
	<h4>Clases de esta materia</h4>	
<hr />
-->		
<?php	$matId = '';  
	mysqli_set_charset( $con, 'utf8');
	// FOR MAESTROS
	$getmethematerias = mysqli_query($con, "SELECT * FROM clases WHERE clases_maestro='$wer'");
	
	// FOR MANAGERS
	//$getmethematerias = mysqli_query($con, "SELECT * FROM clases");
	
	
	
	while($c = mysqli_fetch_array($getmethematerias)){
	$integrador = $c['clase_integradora'];
	$ci = $c['clases_id'];	
	$cm = $c['clases_unidad'];
	$matId .= $c['clases_material'];
	
	
	}   
	   
	
	$num;
	$no;


	$get_clase_materias = mysqli_query($con,"SELECT 
 	c.clases_maestro,c.clases_material, 
    m.materia_id,m.materia_nombre
    FROM clases AS c, materias AS m
    WHERE c.clases_material = m.materia_id AND 
  		  c.clases_maestro = $wer  
    	
    GROUP BY m.materia_id
  	");

	echo '<ul class="accordion" data-accordion>';   
	
	while($m = mysqli_fetch_array($get_clase_materias)){
	echo '<li class="accordion-navigation">
    
    <a href="#panel'.$num++.'a" style="font-weight:800;">'.$m['materia_nombre'].'</a>
    <div id="panel'.$no++.'a" class="content" style="padding:0px;">';
    					   
	$get_clase_unidades = mysqli_query($con,"SELECT 
 	c.clases_id,c.clases_maestro,c.clases_unidad,c.clases_material,
 	u.unidad_id,u.unidad_num,u.unidad_titulo
    FROM clases AS c, unidades AS u
    WHERE u.unidad_id = c.clases_unidad AND
    	  c.clases_maestro = $wer AND
    	  c.clases_material = ".$m['materia_id']."
    	  
  	ORDER BY u.unidad_num ASC
  	");
  	
  	// Here we set variables to be used down stream when updating files
  	$unidad_selectionado = '';
  	
  	while($u = mysqli_fetch_array($get_clase_unidades)){  	
	echo '<a href="#">
			  <div id="'.$u['clases_id'].'" 
			  	  class="getclassdata large-12 columns" 
			  
				  style="font-size:13px; 
				  		 padding:20px;
				  		 color:#fff;
				  		 background:#1c7cd6;
				  		 border-bottom:1px solid #ccc;" >
				  '.$u['unidad_num'].' - '.$u['unidad_titulo'].'
			  
			  </div>
		  </a>';
		  
		  
	  	
  	}
						  	
					 	
    
	echo '</div>
	</li>'; }
	echo '</ul>';
	
	?>    

	</div>
<!-- <div class="large-3 medium-3 small-5 columns"> -->

<div class="large-9 medium-3 small-12 columns" >
	
	<div class="large-12 columns classData" style="border-left:1px dotted #ccc; min-height:500px;">
		<br />
		<div class="large-6 large-centered columns text-center"><br/>
			
			<?php
			if(isset($_GET['updated'])){
				echo '<h1 style="color:#ccc;">ACTUALIZACION EXITOSA</h1>';
				echo '<hr />';
				$file = $_GET['updated'];
				$ext = end(explode(".", $file));
				
				echo '<img src="img/'.$ext.'.png">';
				echo '<br />';
				echo $file;
				
				
			}else{	
			?>
			
			<h3>Escoge tu clase y unidad</h3><hr /><img src="http://leavirtual.com/assets/img/LeavVirtualLogo_web.png">
			
			<?php }?>
		</div>
		
		
	</div>
	
	
	
	
</div>



<div id="iframe_code" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
  
  <div id="iframe_code_snippet" class="text-center">
  
  
  </div>
  
  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>


<div id="addhtmlcodehere" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
  <?php 

  function litempates($id,$template,$img){
	  echo '<div id="'.$img.'" style="padding:0px; margin:0px;" class="large-3 columns"><h6 class="'.$template.'">'.$template.'</h6><div class="'.$id.'" style="border:1px solid #ccc; padding:0px; margin:0px 10px 0px 0px;">
	  <img src="templates/'.$img.'.svg"></div></div>';
  }
   		  
	  
  ?>
  <div class="large-12 columns">
  <h3>HTML Converter</h3>
  <a href="#" class="getTemplates button tiny radius secondary">Plantillas</a>
  
  
  <div id="templatesSection">
	  
	  <hr / >
	  <?php 
		
		  litempates('plantilla','Banded','banded');
		  
		  //litempates('plantilla','Banner-Home','banner-home');
		  
		  litempates('plantilla','Blog','blog');
		  
		  litempates('plantilla','Grid','grid');
		  
		  //litempates('plantilla','Marketing2','marketing2');
		  
		  //litempates('plantilla','Orbit-home','orbit-home');
		  
		  litempates('plantilla','Portfolio','portfolio');
		  
		  //litempates('plantilla','Boxy','boxy');
		  
		  //litempates('plantilla','Workspace','workspace');
	  ?>
	</div>  
	  <hr / style="border:0px;">
  
  <textarea rows="10" id="showPreview_code"></textarea>
  <button id="convert_code" class="tiny radius" style="background:rgb(52,170,220);">Vista Previa</button>
  
  <button id="store_code" class="right tiny radius" style="background:rgb(255,73,129);">Guardar</button>
  
  </div>
  <div class="large-12 columns"><h4 id="template_name"></h4></div>
  <div id="showPreview_html">
  
  </div>	  
	  
</div>


<?php include 'includes/footer.php'; ?>    





<?php include 'includes/pagebase.php'; }
	
	echo mysqli_error($con);
	
?>
