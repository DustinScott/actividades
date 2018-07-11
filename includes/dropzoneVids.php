<?php include 'ewp.php';
	
		
		if(!empty($_FILES['vid'])){
			
		$theFile = $_FILES['vid']['name'];	
		
		list($vid_title,$activity,$herr,$fileType) = explode('_', $theFile);
		
		$uploadL = mysqli_query($con, "INSERT INTO captivates(cap_title,cap_activity,cap_herra,cap_file)VALUES('$vid_title','$activity','$herr','$theFile')");
		
		//Make sure we have a filepath
		
				  $tmpFilePath = $_FILES['vid']['tmp_name'];
				 
				  if ($tmpFilePath != ""){
				  
				  //Setup our new file path
				  $newFilePath = "../videos/".$theFile."" ;
				
				  //Upload the file into the temp dir
				  move_uploaded_file($tmpFilePath, $newFilePath);
		
				  }
		}

		
	
	
	
?>