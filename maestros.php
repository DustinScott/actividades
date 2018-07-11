<?php include 'includes/head.php';?>


<?php 
	
	if($_SESSION['role'] == 2){
	
	echo '<meta http-equiv="refresh" content="0; URL=\'index.php\' " />';
	
	}elseif($_SESSION['role'] == 1){
	?>

<div class="row">

<?php include 'includes/mainNav.php';
	
		function inputmaestro($label,$id){
			echo '<label>'.$label.'';
				
				
				echo '<input type="text" id="'.$id.'">'; 
				
				
			echo '<label>';
		}
	
?>

<hr / class="x">
		
		<div class="large-4 medium-4 columns">
		
			<?php
				
			inputmaestro('Nombre','nombre');
			inputmaestro('Apellido','apellido');	
			inputmaestro('Correo-E','email');
			inputmaestro('Telefono','telefono');
			
			?>
			
		<label>Password	
		<input type="password" id="password">		</label>
		
		
		<label>Role
		<select id="role_for_teacher">
		<option selected="true" disabled="disabled">Role</option>	
		<option id="1">Admin</option>
		<option id="2">Maestro</option>
		</select>
		
		
		<button id="submit_maestro" class="radius tiny">Save</button>
		</div>
		
		<div class="large-8 medium-8 columns">
		
		<div id="TeacherProfile">
		
		</div>
		
<hr / class="x">		
		<div class="large-12 columns">
		
		</div>

</div>

<div class="row">
<div class="large-12 columns">
	
	

<hr />
	</div>
</div>

<div class="row">
	<div class="large-12 columns">
	<table>
  <thead>
    <tr>	
		<th width="200">ID</th>
		<th width="200">Nombre</th>
		<th width="200">Apellido</th>
		<th width="200">Correo</th>
		<th width="200">Telefono</th>
		<th width="200">DESDE</th>

		<th width="200">role</th>
		<th width="200"><i class="fa fa-trash" aria-hidden="true"></i></th>
    </tr>
  </thead>
  <tbody>
	  
	<?php 
	$queryMaestros = mysqli_query($con,"SELECT * FROM maestros");	
	while($m = mysqli_fetch_array($queryMaestros)){
	echo '<tr>
		<td>'.$m['maestros_id'].'</td>
		<td>'.$m['maestros_fname'].'</td>
		<td>'.$m['maestros_lname'].'</td>
		<td>'.$m['maestros_email'].'</td>
		<td>'.$m['maestros_telefono'].'</td>
		<td>'.$m['maestros_timestamp'].'</td>';
		if($m['role'] == 1){
			echo '<td>Admin</td>';
		}elseif($m['role'] == 2){
			echo '<td>Maestro</td>';
		}
		
		echo '<td><a href="includes/delmaestro.php?delmaestro='.$m['maestros_id'].'" class="button tiny alert">BORRAR</a></td>'; 
		
    echo '</tr>';	
		}
	?>
      </tbody>
</table>
	</div>
</div>

<?php include 'includes/footer.php'; ?>
<?php include 'includes/pagebase.php'; }?>