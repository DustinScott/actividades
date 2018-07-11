<?php include '../ewp.php';
	
	$delVidEmbed = $_POST['delVidEmbed'];
	
	if(!empty($delVidEmbed)){
		
		$d_query = mysqli_query($con,"DELETE FROM video_embeds WHERE 	
video_embeds_id='$delVidEmbed'");

		if($d_query){
		
		echo 'Video Successfully Deleted';
		
		}else{
	    echo 'something not quite right...';
		}
		
	}
	
	?>