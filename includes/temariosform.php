



<?php 
echo '<form action="includes/uptemario.php" method="post">';	
	echo '<div class="large-4 columns left">
	
	
	<select name="materia_numero" id="sel_mat">';
	
	mysqli_set_charset( $con, 'utf8');
	$get_materias = mysqli_query($con,'SELECT * FROM materias');
	
	
	$modN = '';
	$cuaN = '';
	
	while($mat_sel = mysqli_fetch_array($get_materias)){
	
		echo '<option value="'.$mat_sel['materia_id'].'"> '.$mat_sel['materia_nombre'].' </option>';
	}
		
	
			echo '</select></div><hr />';
	
	
	function uploadunit($divsize,$file_txt_area,$label,$name){
		
		echo '<div class="large-'.$divsize.' columns"><label>'.$label.'<br /><input type="'.$file_txt_area.'" name="'.$name.'" ></label></div>';
		
	}
	
	
	uploadunit('2' ,'text','Numero del Unidad','unidad_num');
	uploadunit('10' ,'text','Titulo','unidad_titulo');
	uploadunit('12','text','Proposito','unidad_proposito');
	
	
	
?>

<div class="large-12 columns">
	<hr />
	
	<label>Desempeño</label>
<textarea class="fluentTxtEditor" name="unidad_desempeno">Desempeño</textarea>

</div>

<div class="large-12 columns">
	<hr />
	<label>Temario</label>
<textarea class="fluentTxtEditor" name="unidad_temario">Temario</textarea>
<hr />
</div>

<div class="large-4 columns left"><input class="button secondary" type="submit"></div>
</form>



