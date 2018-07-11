<?php include '../ewp.php';
	
	$claseId = $_POST['clase_id'];
	
	function vid($vid_iframe,$vid_TTL,$delVidEmbed){
		
		
		$string = $vid_iframe;
		$fls = $string['0'];
		$pos = strpos($string, "src");
		
		$newvid = substr_replace($string,' <iframe width="100%" height="300px" ',0,$pos);
		
		
		echo $newvid;
		
		echo '<div class="orbit-caption" >';
				
				echo $vid_TTL;


				// This button Deletes the Video
				echo '<i id="'.$delVidEmbed.'" class="button tiny radius fa fa-eraser fa-2x right delVidX" style="margin-left:10px;" aria-hidden="true" data-reveal-id="DelVideo"></i>';
				
			    echo '<i class="button tiny radius fa fa-share-alt fa-2x right shareiticon" aria-hidden="true"></i>';			    
			    
			    
			    
			    echo '<div id="DelVideo" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
							  
							  	
							 <div id="videoyouwanttodelete">
							 
							 </div>
  
							 
					  
					  </div>';
			    
							echo '<textarea style="padding:10px;" class="tvt">'.$newvid.'</textarea>';
		
		echo'</div>';
		
	}
	
	
	$claseGET = mysqli_query($con,"SELECT * FROM clases WHERE clases_id='".$claseId."'");
	
	while($clase = mysqli_fetch_array($claseGET)){
	 	$cm = $clase['clases_material'];
	 	$cu = $clase['clases_unidad'];
	
		$getVids = mysqli_query($con,"SELECT * FROM video_embeds WHERE materia_id='".$cm."' AND unidad_id='".$cu."'");
		
		
		echo '<ul class="example-orbit" data-orbit>';
		while($GV = mysqli_fetch_array($getVids)){
		
			
			
			echo '
			  <li>';
			  vid($GV['video_name'],$GV['video_title'],$GV['video_embeds_id']);
			 echo '</li>';

			
			
			
			
		
					
	
		}
		echo '</ul>';
	
	
	}
?>

  <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    
    <script>
      $(document).foundation();
    </script>