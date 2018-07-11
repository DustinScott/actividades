<?php include 'ewp.php';
	
	$activity = $_POST['activity_change'];
	$her = $_POST['herr_chosen'];
	
	if(!empty($activity)){
	
		function getVid($conx,$activity_x,$her_x){
		$queryVids = mysqli_query($conx,"SELECT * FROM captivates WHERE cap_activity = ".$activity_x." AND cap_herra = ".$her_x."");
		
			while($hx = mysqli_fetch_array($queryVids)){
			
	
			echo '<li> <video width="320" height="240" controls>
			<source src="videos/'.$hx['cap_file'].'" type="video/mp4">
  			</video></li>';	

				
			}
			
		}
	}	
	
	getVid($con,$activity,$her);	
		

	//controls autoplay
	

		
   
   