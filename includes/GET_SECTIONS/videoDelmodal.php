<?php include '../ewp.php';
	
			if(!empty($_POST['vid_id'])){	
			$vid_id = $_POST['vid_id'];
			}
			
			$getVids = mysqli_query($con,"SELECT * FROM video_embeds WHERE video_embeds_id = ".$vid_id."");

			while($vids = mysqli_fetch_array($getVids)){
			
			echo 
			
			  '<div class="large-8 large-centered columns text-center">';
			  
			  echo '<br />';
			  echo $vids['video_title'];
			  
			  echo '<hr />';
			  
			  echo $vids['video_name'];
			  
			  echo '
	
			  <a class="button small alert radius right delVid large-12 columns" aria-hidden="true"  aria-label="Close">BORRAR</a>
		  
			  <!--This Button works with the Delete Button, telling it which ID to look for on the database -->
		
			  <input type="hidden" id="delVidEmbed" value="'.$vids['video_embeds_id'].'">
					    
	          </div>
	          
	           <a class="close-reveal-modal" aria-label="Close">&#215;</a>';
	          
	          }
	          
	          
								 
?>