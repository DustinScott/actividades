<?php   include 'ewp.php'; 
	
	$delactivity = $_POST['delActivity'];
	
	if(!empty($delactivity)){
		
	$queryActividades = mysqli_query($con,"SELECT * FROM actividades_activos WHERE actividades_vivos='".$delactivity."'");
	 $delthisactivity = mysqli_query($con,"DELETE FROM actividades_activos WHERE actividades_vivos='".$delactivity."'");
		
		while($af = mysqli_fetch_array($queryActividades)){
			
			$RandId = $af['random_id'];
		
				if($delthisactivity){
					
						$queryFiles = mysqli_query($con,"SELECT * FROM clase_files WHERE random_id='$RandId'");
						
						while($f = mysqli_fetch_array($queryFiles)){
						
							$ft = $f['file_type'];
							$fn = $f['file_name'];
							
							$clearFile = unlink('../activity_files/clase/actividad/'.$fn.'');	
								if($clearFile){
									$deleteClassFiles = mysqli_query($con,"DELETE FROM clase_files WHERE random_id='$delactivity'");
									
					    		}
				
						
						}
						
						
				}
				
		}		
		
	echo '<div class="text-center"><p>Este Actividad fue Borrado con Exito!</p></div>';
	
	}
	
	
?>