<?php include 'includes/ewp.php';
	
	if(!empty($_POST['unID'])){
		
		$unidad = $_POST['unID'];
		
	}
	
	$getAllImages = mysqli_query($con,"SELECT * FROM clase_images WHERE unidad='$unidad'");
	
	while($img = mysqli_fetch_array($getAllImages)){
		
		echo '<div class="large-3 columns">';
		echo '<img src="img/'.$img['file_name'].'">';
		
		echo '<textarea id="textareaIMG">http://leavirtual.com.mx/actividades/archivos/img/'.$img['file_name'].'</textarea>';
		echo '</div>';
		
	}
	
	echo '<hr />';
?>