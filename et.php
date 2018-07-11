<?php include('includes/head.php');
	
	if(isset($_POST['parent'])){
	$unindad_id = $_POST['parent'];	
	}elseif(isset($_GET['parent'])){
	$unindad_id = $_GET['parent'];	
	}  
	 
	
	
		echo '<div class="row">';
		
			echo '<div class="large-12 columns">';
			
			 include('includes/mainNav.php');
			 
						echo '<form action="includes/upedit_temario.php" method="post">';	
							
						
						
							
						//$get_unidad_foredit = mysqli_query($con,"SELECT * FROM unidades WHERE unidad_id=$unindad_id");
						
						   $unidad_idx = '';
						
						   mysqli_set_charset( $con, 'utf8');
						   $get_unidad_foredit = mysqli_query($con,"SELECT 	unidades.unidad_id,	
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
						   WHERE unidad_id=$unindad_id");	
						
						
						
						
						
						
						
						while($edit_sel = mysqli_fetch_array($get_unidad_foredit)){
							
						$unidad_idx .= $edit_sel['unidad_id'];
						
						echo '<br />';
						echo '<h2> '.$edit_sel['materia_nombre'].' </h2>';
						echo '<h5 style="color:rgb(88,86,214);"> Unidad '.$edit_sel['unidad_num'].'</h5>';
						
						
						
						echo '<hr />';
						
						function editunit($divsize,$file_txt_area,$label,$name,$value){
							
							echo '<div class="large-'.$divsize.' columns" style="padding-left:0px;"><label>'.$label.'<br /><input type="'.$file_txt_area.'" name="'.$name.'" value="'.$value.'"></label></div>';
							
						}
						
						function editunitTA($divsize,$label,$name,$value){
							
							echo '<div class="large-'.$divsize.' columns " style="padding-left:0px;">';
							
								echo '<label>'.$label.'<br />
								
								<textarea  name="'.$name.'">'.$value.'</textarea>
								
								</label>';
								
							echo '</div>';
							
						}
						
						editunit('0' ,'hidden','','unidad_id',$edit_sel['unidad_id']);
					
						editunit('2' ,'text','Numero del Unidad','unidad_num',$edit_sel['unidad_num']);
						editunit('10','text','Titulo','unidad_titulo',$edit_sel['unidad_titulo']);
						editunitTA('12','Proposito','unidad_proposito',$edit_sel['unidad_proposito']);
						
						
						
							
							echo '<hr/>';
							
							echo '<textarea class="fluentTxtEditor" name="unidad_desempeno">'.$edit_sel['unidad_desempeno'].'</textarea>';
							
							echo '<textarea class="fluentTxtEditor" name="unidad_temario">'.$edit_sel['unidad_temario'].'</textarea>';
							
						
				
						
						echo '<div id="additional_'.$edit_sel['unidad_id'].'" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
   
  <div class="large-6 columns">
  <h2 id="modalTitle">'.$edit_sel['materia_nombre'].'</h2>  
  
  </div>
  
  
  
  
  <hr />
  
  <div class="large-6 columns">
  
  <h4><i class="fa fa-eercast" aria-hidden="true"></i> Proposito</h4>
  '.$edit_sel['unidad_proposito'].' 
 
 <hr />
  
  <h4><i class="fa fa-eercast" aria-hidden="true"></i> Desempeño</h4>
  '.$edit_sel['unidad_desempeno'].'	 
  </div>
  
  
  <div class="large-6 columns">
  
  <h4><i class="fa fa-eercast" aria-hidden="true"></i> Temario</h4>
  '.$edit_sel['unidad_temario'].' 
 
  
 
  </div>
  
  
  <div class="large-12 columns" id="'.$edit_sel['unidad_id'].'">
  
  	<hr />
   <a href="#" class="get_dataUni"><i class="fa fa-pencil" aria-hidden="true"></i></a>
  </div>
  
  
  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
  
</div>
		   
		   ';
		   
		   echo '<div id="del_it" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
					 
					 <div class="large-4 large-centered columns">
					 
					 <h1>CONFIRMAR</h1>
					 <hr />
					 <h6>'.$edit_sel['materia_nombre'].'</h6>
					 <h4>Unidad '.$edit_sel['unidad_num'].' </h4>
					 
					 
					 <hr />
					 
						<div class="large-6 columns">
							
							<a href="includes/delUN.php?delunidad='.$unidad_idx.'">
							<i class="button small radius alert fa fa-trash-o fa-2x" aria-hidden="true"></i>
							</a>

						</div>
					
						<div class="large-6	 columns">
							<a href="et.php?parent='.$unidad_idx.'" >
							<i style="background:#000; color:#fff;" class="button small radius fa fa-times-circle-o" aria-label="Close"></i>
							</a>
								 
						</div>	 
					 </div>
					 
					  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
					</div>';
												
						
						}
					?>
					
					<hr />
					
					<div class="large-2 columns left" style="padding-left:0px;"><input class="button secondary small radius" type="submit"></div>
					<a href="#" data-reveal-id="myModal" id="<?php echo $unidad_idx;?>"><div class="large-2 columns left button secondary small radius view_dataUni" style="background:rgb(164,231,134);">Preview</div></a>
					
					
					<a href="#" data-reveal-id="del_it"><div class="large-1 columns button small radius alert right"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></div></a>
					
<div id="del_it" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
					 
					 <a href="includes/delUN.php?delunidad=<?php echo $unidad_idx;?>" data-reveal-id="del_it"><div class="large-1 columns button small radius alert right"><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></div>
					 
					 
					  <a class="close-reveal-modal " aria-label="Close">&#215;</a>
					</div>
					
					</form>
		</div>
	</div>
</div>





<?php include 'includes/pagebase.php'; ?>
