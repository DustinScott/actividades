<?php include 'ewp.php';
	
	mysqli_set_charset( $con, 'utf8');
	
	$clase_id = $_POST['clase_id'];
	
	// MYSQLI FUNCTIONS
	
	$class_data = mysqli_query($con, "SELECT * FROM clases WHERE clases_id=".$clase_id."");
	

	include 'mainFunctions.php';

			while($c = mysqli_fetch_array($class_data)){			
		
			echo '<div class="didacticFiles large-6 small-12 columns ">';
			echo ht('h5','Lecturas');
			
			

			
			
			$files_id = qfiles($con,'clase_files','file_unidad',$c['clases_unidad'],'l','clase_file_id');
			
			$nm = 1;
			$nx = 1;
			
			foreach($files_id as $f){
			
					$queryFileId =  mysqli_query($con,"SELECT * FROM clase_files WHERE clase_file_id='$f'");
					while($fl = mysqli_fetch_array($queryFileId)){
						
						echo'<div id="lectura" class="large-12 columns activityfilelinks panel left">
			
						<a href="activity_files/clase/lectura/'.$fl['file_name'].'" alt="Lectura '.$nx++.'">
						
				        <span style="display:none;" class="thefileName">'.$fl['file_name'].'</span>';
				
						$ext = get_extension($fl['file_name']);
						
						echo '<img class="extimg left" src="img/'.$ext.'.png" width="15%">';
						
						echo '<span class="left">'.$fl['file_name'].'</span></a>';
						
						echo '<a class="a_edots" href="#">';
						EB('fileUpdater');
						echo '</a>';
						
						
						echo '<input type="hidden" id="file_id" value="'.$fl['clase_file_id'].'">';
						
						$LRowId = qhtml($con,$fl['file_name'],$c['clases_material'],$c['clases_unidad']);
						
						echo '<a id="'.$LRowId.'" class="shareThisLink" href="#">';
						EB_SHARE('sharefilelink');
						echo  '</a>';
				
				echo '</div>';
						
						
					}
			}
			
			
			echo '</div>';
			
			
			echo '<div class="didacticFiles large-6 small-12 columns">';
			echo ht('h5','Presentaciones');
			
			$files = qfiles($con,'clase_files','file_unidad',$c['clases_unidad'],'p','clase_file_id');
			
			$no = 1;
			$nmb = 1;
			$nxa = 1;
			foreach($files as $f){
				
				$queryFileId =  mysqli_query($con,"SELECT * FROM clase_files WHERE clase_file_id='$f'");
					while($fl = mysqli_fetch_array($queryFileId)){
				
					echo'<div id="presentacion" class="large-12 columns activityfilelinks panel left">
							<a href="activity_files/clase/presentacion/'.$fl['file_name'].'"  alt="Presentacion '.$nxa++.'">';
							
					echo '<span style="display:none;" class="thefileName">'.$fl['file_name'].'</span>';
							$ext = get_extension($fl['file_name']);
							
							echo '<img class="left" src="img/'.$ext.'.png" width="15%">';
							
							echo '<span class="left"> '.$fl['file_name'].'</span></a>';
							
							echo '<a class="a_edots" href="#">';
							EB('fileUpdater');
							echo '</a>';
							
							echo '<input type="hidden" id="file_id" value="'.$fl['clase_file_id'].'">';
							
							$LRowId = qhtml($con,$fl['file_name'],$c['clases_material'],$c['clases_unidad']);
							echo '<a id="'.$LRowId.'" class="shareThisLink" href="#">';
							EB_SHARE('sharefilelink');
							echo  '</a>';
					
					echo '</div>';
					}
			}
			echo '</div>';			
		}

		
?>
	
    <script src="js/foundation.min.js"></script>
    <script src="js/foundation/foundation.offcanvas.js"></script>
    
    <script>
     $(document).foundation();
     
     $(document).on('click','.a_edots',function(){ 
     $(document).foundation('offcanvas', 'show', 'move-left');
     }); 
    </script>
	
	