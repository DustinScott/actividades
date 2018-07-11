<div class="row">
	<div class="large-12 columns">
		<br />
	<h4>Clases de esta materia</h4>	
<hr />		
<?php	  
	mysqli_set_charset( $con, 'utf8');
	$getmethematerias = mysqli_query($con, "SELECT * FROM clases WHERE clases_maestro='$wer'");
	
	$cm='';
	
	while($c = mysqli_fetch_array($getmethematerias)){
	
	
	$cm = $c['clases_unidad'];	
	
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
	   RIGHT JOIN materias ON  unidades.materia_numero = materias.materia_id
	   WHERE unidad_id='$cm'");
	   
	   
	   while($m = mysqli_fetch_array($get_termarios)){
		echo '<a href="#" data-reveal-id="clase_'.$cm.'">';   
		
	    echo '<div class="large-3 columns panel">';
	    echo '<h5>Materia</h5>'.$m['materia_nombre'];
	    echo '<hr />';
	    echo '<h3>Unidad</h3>'.$m['unidad_num'];
	    
	    echo '</div></a>';
	    
	    echo '

		<div id="clase_'.$cm.'" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
		 
		 <div class="large-12 columns">
		 <h2>'.$m['materia_nombre'].'</h2>
		 <h5>Unidad '.$m['unidad_num'].'</h5>';
		
		 
		 $q_mae = mysqli_query($con,"SELECT * FROM maestros WHERE maestros_id='".$c['clases_maestro']."'");
		 while($Wmaestro = mysqli_fetch_array($q_mae)){
		echo '<h5>Docente : '.$Wmaestro['maestros_fname'].' '.$Wmaestro['maestros_lname'].'</h5>';
			 
		 }
		 
		 
		 echo '</div>';
		 
		 echo '<div class="large-12 columns"><hr /></div>';
		 
		 
		 
		 
		echo '<div class="large-3 columns" style="margin-bottom:40px;"">';
		 
			
			 
			 
			 $queryActividades = mysqli_query($con,"SELECT * FROM actividades WHERE actividad_id='".$c['clases_actividad']."'");
			 while($Wact = mysqli_fetch_array($queryActividades)){
				 echo '<h3>Actividad</h3>';
				 echo $Wact['actividad_name'];
				 
				 
			 }
			
echo '<hr />'; 
			 
			 $queryHerramientas = mysqli_query($con,"SELECT * FROM herramientas WHERE 	
herramientas_id='".$c['clases_herramienta']."'");
			 while($Wherr = mysqli_fetch_array($queryHerramientas)){
				  echo '<h3>Herramienta</h3>';
				 echo $Wherr['herramientas_name'];
				 
			 }
echo '<hr />'; 	 
			 echo '<h3>Clase</h3>';
			 
			 $queryLeturas = mysqli_query($con,"SELECT * FROM clase_files WHERE file_type='lectura' AND file_unidad='$cm'");
			 
			 $lec_file = ''; 
			 
			 while($fillz = mysqli_fetch_array($queryLeturas)){
			 
			 	$lec_file .= $fillz['file_name']; 
			 	$lec_ext = pathinfo($lec_file, PATHINFO_EXTENSION);
				
				if($lec_ext == 'doc' || $lec_ext == 'docx'){
		        $lec_ex = $docs = '<i class="fa fa-file-text-o fa-lg" aria-hidden="true"></i>';
		        }elseif($lec_ext == 'xlsx' || $lec_ext == 'xls'){
		        $lec_ex = $xls = '<i class="fa fa-file-excel-o fa-lg" aria-hidden="true"></i>';
		        }elseif($lec_ext == 'pdf'){
		        $lec_ex = $pdf = '<i class="fa fa-file-pdf-o fa-lg" aria-hidden="true"></i>';
		        }elseif($lec_ext == 'mp4'){
		        $lec_ex = $mp4 = '<i class="fa fa-microphone fa-lg" aria-hidden="true"></i>';
		        }elseif($lec_ext == 'ppt' || $lec_ext == 'pptx'){
				$lec_ex = $ppt = '<i class="fa fa-file-powerpoint-o fa-lg" aria-hidden="true"></i>';
				}elseif($lec_ext == 'png' || $lec_ext == 'jpg' || $lec_ext == 'jpeg' || $lec_ext == 'JPEG'){
				$lec_ex = $pic = '<i class="fa fa-picture-o" aria-hidden="true"></i>';
				}	
			}
			
			$querypresentacion = mysqli_query($con,"SELECT * FROM clase_files WHERE file_type='presentacion' AND file_unidad='$cm'");
			 
			while($filspr = mysqli_fetch_array($querypresentacion)){
			 
			 	$pr_file .= $filspr['file_name']; 
				$ppt_ext = pathinfo($pr_file, PATHINFO_EXTENSION);
				
				if($ppt_ext == 'doc' || $ppt_ext == 'docx'){
		        $ppt_ex = $docs = '<i class="fa fa-file-text-o fa-lg" aria-hidden="true"></i>';
		        }elseif($ppt_ext == 'xlsx' || $ppt_ext == 'xls'){
		        $ppt_ex = $xls = '<i class="fa fa-file-excel-o fa-lg" aria-hidden="true"></i>';
		        }elseif($ppt_ext == 'pdf'){
		        $ppt_ex = $pdf = '<i class="fa fa-file-pdf-o fa-lg" aria-hidden="true"></i>';
		        }elseif($ppt_ext == 'mp4'){
		        $ppt_ex = $mp4 = '<i class="fa fa-microphone fa-lg" aria-hidden="true"></i>';
		        }elseif($ppt_ext == 'ppt' || $ppt_ext == 'pptx'){
				$ppt_ex = $ppt = '<i class="fa fa-file-powerpoint-o fa-lg" aria-hidden="true"></i>';
				}elseif($ppt_ext == 'png' || $ppt_ext == 'jpg' || $ppt_ext == 'jpeg' || $ppt_ext == 'JPEG'){
				$ppt_ex = $pic = '<i class="fa fa-picture-o" aria-hidden="true"></i>';
				} 

			}
			
			$act_ext = pathinfo($c['clases_activity_file'], PATHINFO_EXTENSION);
			
			if($act_ext == 'doc' || $act_ext == 'docx'){
	        $act_ex = $docs = '<i class="fa fa-file-text-o fa-lg" aria-hidden="true"></i>';
	        }elseif($act_ext == 'xlsx' || $act_ext == 'xls'){
	        $act_ex = $xls = '<i class="fa fa-file-excel-o fa-lg" aria-hidden="true"></i>';
	        }elseif($act_ext == 'pdf'){
	        $act_ex = $pdf = '<i class="fa fa-file-pdf-o fa-lg" aria-hidden="true"></i>';
	        }elseif($act_ext == 'mp4'){
	        $act_ex = $mp4 = '<i class="fa fa-microphone fa-lg" aria-hidden="true"></i>';
	        }elseif($act_ext == 'ppt' || $act_ext == 'pptx'){
			$act_ex = $ppt = '<i class="fa fa-file-powerpoint-o fa-lg" aria-hidden="true"></i>';
			}elseif($act_ext == 'png' || $act_ext == 'jpg' || $act_ext == 'jpeg' || $act_ext == 'JPEG'){
			$act_ex = $pic = '<i class="fa fa-picture-o" aria-hidden="true"></i>';
			}      				 
			
			
			echo '<a href="activity_files/'.$c['clases_lectura'].'"><button class="secondary  small radius"> '.$lec_ex.'  Lectura</button></a>';
			
			echo '<a href="activity_files/'.$c['clases_presentacion'].'"><button class="secondary small radius"> '.$ppt_ex.' Presentaions</button></a>
			
			<a href="activity_files/'.$c['clases_activity_file'].'"><button class="secondary small radius"> '.$act_ex.' Actividad</button></a>
			<br /> 
			</div>
		
		
		<div class="large-9 columns" style="margin-bottom:40px;">
			
			<div class="large-12 columns">
				 <h3>Video</h3>
				 <div>
				 '.$c['clases_video'].'
				 </div>
				 
				 <textarea rows="5">
				 '.$c['clases_video'].'
				 </textarea>
			</div>
			
		</div>
		
		 <div class="large-12 columns" style="border-top:1px dotted #ddd;">
		 <br />
		 	
			 	 <h3>Instruciones</h3>
				 '.$c['clases_instructions'].'
			 
		 </div>
		 
		 <div class="large-12 columns" style="border-top:1px dotted #ddd;">
		 <hr />
		 	
			 	 <h6>Fecha de Creacion</h6>
				 '.date($c['classes_timestamp']).'
			 
		 </div>
		 
		 <a class="close-reveal-modal" aria-label="Close">&#215;</a>
		</div>';
	    
	    }
	    
    
    }
?>    

	</div>
