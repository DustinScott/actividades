<?php include 'ewp.php';
	
	
	$delvid = $_POST['delvid'];
	
	$querydelvid = mysqli_query($con,"DELETE FROM captivates WHERE cap_id='".$delvid."'");
	
	if($querydelvid){
		echo 'Video fue Borrarado';
	}else{
		echo 'hmm...keep tinkering';
	}
	
	
?>