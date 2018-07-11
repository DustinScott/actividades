<?php include 'ewp.php';
	
$activity_id = $_POST['activity_id'];

include 'mainFunctions.php';

$queryActividades = mysqli_query($con, "SELECT * FROM actividades_activos WHERE actividades_vivos='$activity_id'");



while($ax = mysqli_fetch_array($queryActividades)){
						
						echo '<input type="hidden" id="CourseActivityId" value="'.$activity_id.'">';
							
						echo '<h2>Instrucciones</h2>';
							
						$inx = $ax['actividad_instructiones']; 	
						
						if(!$inx){
						echo 'Falta Añadir Instruciones';	
						}else{
						echo '<div id="inst_'.$activity_id.'">';	
						echo $inx;
						echo '</div>';
						}
						
						echo '<hr />';
						
						echo '<h2>Imagenes ó Archivos</h2>';
						
						echo '<div class="large-12 columns dropzone_again">Añadir Archivos</div>';
						
						$rn = $ax['random_id']; 
						$getFiles = mysqli_query($con, "SELECT * FROM clase_files WHERE random_id='$rn'");	
						
						while($actFiles = mysqli_fetch_array($getFiles)){
						
						$img = $actFiles['file_name'];
			
						$ext = get_extension($img);
						
						
						
						echo '
						<div class="large-3 columns text-center" style="background:TRANSPARENT; border:1px solid #ddd; border-radius:2px; padding:5px;">
						
						<a class="button secondary text-center activity_curFile" href="activity_files/clase/actividad/'.$img.'" target="blank" style="background:TRANSPARENT;"> 
						
						
						<p class="text-center"> 
						<img class="extimg left text-center" src="img/'.$ext.'.png" width="50%"> 
						<br />
						<span style="font-size:15px;"> '.$img.' </span>
						</p>
						
						
						</a>';
						echo '<hr / style="border:1px solid #fff;">';
						echo '<i class="fa fa-trash fa-lg right del_act_file_id" id="'.$actFiles['clase_file_id'].'" aria-hidden="true"></i>';
						echo '</div>';
						
						}
						echo '<hr />';
						echo '<div style="padding:0px;">';
						echo '<button id="editthistable" class="button tiny secondary">EDITAR</button>';
						echo '</div>';
						
		
    }
	
?>	


 


	<script src="js/vendor/jquery.js"></script>
	<script src="js/foundation/foundation.js"></script>
	<script src="js/dropzone.js"></script>
	
    <script>
    $(document).foundation();
      
    </script>
    
    


