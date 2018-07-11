<?php include('ewp.php');
	 
	$unindad_id = $_POST['parent'];
	 
	echo '<form action="includes/upedit_temario.php" method="post">';	
		echo '<div class="large-4 columns left">';
	
		
	//$get_unidad_foredit = mysqli_query($con,"SELECT * FROM unidades WHERE unidad_id=$unindad_id");
	
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
	
	echo '<h2> '.$edit_sel['materia_nombre'].'</h2>';
	
	echo '</div><hr />';
	
	function editunit($divsize,$file_txt_area,$label,$name,$value){
		
		echo '<div class="large-'.$divsize.' columns"><label>'.$label.'<br /><input type="'.$file_txt_area.'" name="'.$name.'" value="'.$value.'"></label></div>';
		
	}
	
	function editunitTA($divsize,$label,$name,$value){
		
		echo '<div class="large-'.$divsize.' columns "><label>'.$label.'<br />
		
		<textarea class="fluentTxtEditor" name="'.$name.'">'.$value.'</textarea>
		
		</label></div>';
		
	}
	
	editunit('0' ,'hidden','','unidad_id',$edit_sel['unidad_id']);

	editunit('2' ,'text','Numero del Unidad','unidad_num',$edit_sel['unidad_num']);
	editunit('10','text','Titulo','unidad_titulo',$edit_sel['unidad_titulo']);
	
	editunitTA('12','Proposito','unidad_proposito',$edit_sel['unidad_proposito']);
	editunitTA('12','Desempeños','unidad_desempeno',$edit_sel['unidad_desempeno']);
	
	echo '<div class="fluentTxtEditor">'.$edit_sel['unidad_temario'].'</div>';
	
	//editunitTA('12','Temario','unidad_temario',$edit_sel['unidad_temario']);
	
	
	}
?>
<hr />
<div class="large-4 columns"><input class="button secondary" type="submit"></div>



</form>
<a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>

