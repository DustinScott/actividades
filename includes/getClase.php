<?php include 'ewp.php';
	mysqli_set_charset( $con, 'utf8');
	
	$clase_id = $_POST['clase_id'];
	
	// MYSQLI FUNCTIONS
	
	$class_data = mysqli_query($con, "SELECT * FROM clases WHERE clases_id=".$clase_id."");
	
	include 'mainFunctions.php';
	
	
	
	
	// HTML TEXT $VARIABLES
	
	
		$claseMat = '';	
		$claseUni = '';
		$nameofteacher = '';
		$unidad = '';
		$unidadttl  = '';
		
	while($c = mysqli_fetch_array($class_data)){
		
		$maestroFN = qquery($con,'maestros','maestros_id',$c['clases_maestro'],'maestros_fname');
		$maestroLN = qquery($con,'maestros','maestros_id',$c['clases_maestro'],'maestros_lname');
		$materia = qquery($con,'materias','materia_id',$c['clases_material'],'materia_nombre');
		$unidad .= qquery($con,'unidades','unidad_id',$c['clases_unidad'],'unidad_num');
		$unidadttl .= qquery($con,'unidades','unidad_id',$c['clases_unidad'],'unidad_titulo');
		$actividad = qquery($con,'actividades','actividad_id',$c['clases_actividad'],'actividad_name');
		$herramienta = qquery($con,'herramientas','herramientas_id',$c['clases_herramienta'],'herramientas_name');
		$a_i = qquery($con,'clases','clases_id',$clase_id,'clases_activity_file');
		$a_i_nombre = qquery($con,'clases','clases_id',$clase_id,'clases_NA');
		
		$timestamp = strtotime($c['classes_timestamp']);
		$timestamp = date("F d Y ", $timestamp);
		
		echo '<div class="large-12 columns">';
		
		$claseMat .= $c['clases_material'];
		$claseUni .= $c['clases_unidad'];
		$nameofteacher .= $maestroFN.' '.$maestroLN; 
		
		echo '<div class="large-12 columns MainTitleBars mtbDetalles">
	
			
			<div class="large-12 columns">	
			
			<h3 class="recursoTitle">'.$materia.'</h3>
			
			<div class="arrow-up"></div>
			</div>
			</div>';
			
		echo '<br />';
		
		
		
		
		
		echo '<fieldset class="fieldset">
		<legend>Detalles</legend>';	
		
		
		
		echo ht('h6','Unidad  '.$unidad.' - '.$unidadttl);
		//echo ht('h6','Actividad - '.$actividad.'');
		//echo ht('h6','Herramienta - '.$herramienta.'');
/*
		if(!empty($c['clase_integradora'])){
			ht('h6','Integradora - '.$c['clase_integradora'].'');
		}
*/		
		echo '<hr />';
		echo '<div class="left">';
		echo ht('h6','<i>Creado - '.$timestamp.'</i>');
		echo '</div>';
		
		echo '<div class="right">';
		echo ht('h6','Docente - '.$maestroFN.' '.$maestroLN);
		echo '</div>';
		
		echo '</div>';	
		
		echo '</fieldset>';
			
		
		
		
		
		
			
		
		
		//echo '<hr / style="border:#fff;">';
		echo '<div class="large-12 small-12 columns" >';
		
			echo '<div class="large-12 columns MainTitleBars mtbRecursos">
			<h3 class="recursoTitle left">Clase</h3>';
			
		
			echo '
			<br /><br />
			<div class="arrow-up"></div>
			</div>';
			
			// Videos
			echo '<fieldset class="fieldset large-6 columns">
		
			<legend>Videos</legend>';	
			
			echo '<div id="get_show_videos"></div>';
			echo '<hr />';
			
			echo '<div id="addVidCntr" style="display:none;">';
			echo '<label>Titulo del Video</label>';
			
				echo '<input class="large-8 columns" id="classvideotitle"> ';
				
				echo '<textarea class="large-12 columns" id="classVidIframe"> </textarea> <br />
				<a href="#" class="button tiny radius sendVidIframe large-3 columns" style="background:#173754;">SUBIR VIDEO</a>';
			
			echo '</div>';
			
			echo '<a href="#" class="button tiny radius secondary large-3 columns left" id="VideoAddCenter"><i class="fa fa-plus-square" aria-hidden="true"></i> NUEVO VIDEO </a>';
			
			
			echo '<a href="#" class="button tiny radius secondary large-3 columns right" id="refreshVideos"><i class="fa fa-refresh" aria-hidden="true"></i> Actuliza Videos</a>';
						
			echo '</fieldset>';			
			
			
			
			// Lecturas and Presentations
			echo '<fieldset class="fieldset fieldSetArcvhives large-6 columns right" style="width:49%;">
			
			<legend>Lecturas y Presentaciones</legend>';
		
			
			
			echo '<div id="listTheFiles"> List of the files here.</div>';
			
			echo '<hr / style="border:0px;">';
			echo '<div id="dropfilesarea" style="display:none;">';
			echo '<div class="dropLecPresHere">Drop Files Here</div>';
			echo '</div>';
			
			echo '<hr />';
			echo '<a href="#" class="button tiny radius secondary large-12 columns left" id="dropfileCenter"><i class="fa fa-plus-square" aria-hidden="true"></i> NUEVO ARCHIVO ó PRESENTACION </a>';
			
			echo '</fieldset>';
			
		echo '<hr />';
		
		//Actividades
// 		echo '<div class="large-12 columns">';
		echo '<div class="large-12 columns MainTitleBars mtbActividad">
		<h2 class="recursoTitle left">Actividades</h2>
		<h2 class="recursoTitle right"><i class="fa fa-plus addBoxes" aria-hidden="true" data-reveal-id="Class" ></i></h2>  	<br /><br />
		<div class="arrow-up"></div>
		</div>';
		
		
// 		echo '</div>';
		
		echo '<div id="active_actividades">
		
		</div>';
		
		
		//$c['clases_instructions'];
		// Borrar este Clase
		echo '<div class="right"><a data-reveal-id="confirmdelclase" class="button secondary tiny radius"><i class="fa fa-trash-o fa-lg" aria-hidden="true" style="margin-right:10px;"></i> Borrar Esta Clase</a></div>';
		

		echo '<div id="confirmdelclase" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog" style="padding:0px;">
		  <h2 id="modalTitle" style="background:red; width:100%; height:100px; border-top-right-radius:3px; border-top-left-radius:3px; color:#fff; padding:20px;">
		  
		  CONFIRMAR
		  
		  </h2>
		  <div class="large-12 columns">
			  <p class="lead">¿Esta seguro que desa borrar la Unidad '.$unidad.' - '.$unidadttl.'?</p>
			  <p style="font:14px; color:#333;"> Cuidado, Esta acción borrará <i color="red"><u>Todo Archivo</u></i>, <i color="red"><u>Codigo HTML</u></i> y  <i color="red"><u>Cualquier Elemento Relacionado</u></i> a esta unidad!</p>
			  <input type="hidden" id="teacherwho" value="'.$maestroFN.' '.$maestroLN.'">
			  <input type="hidden" id="unidadwhich" value="'.$unidad.' de la Materia '.$materia.'">	
			  		  
			  <a class="button tiny alert" id="confirm_Total_delclase">Confirmar y Borrar</a>
			  <a class="button tiny right" style="background:#000; color:#fff;" id="cancel_Total_delclase">Cancelar</a>
			  
			
			
			 
		  </div>
		  <hr / style="border:0px solid #fff;">
		  <div id="trb"></div> 
		  
		  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
		  
		</div>';
	} 
	

	
	include 'addNew/reveals_vid_lec_pres_activity.php';
	
?>
	
	<script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script src="js/dropzone.js"></script>
<!--     
	<script src="js/foundation/foundation.reveal.js"></script> 
-->
   
 	<script>
      $(document).foundation();
    </script>



		
	