<?php include 'ewp.php';
	
	$email = $_POST['email'];
	$pswd = $_POST['pswd'];
	
	$querymaestros = mysqli_query($con,"SELECT * FROM maestros WHERE maestros_email='$email' AND pswd='$pswd'");
	
	$rows = mysqli_num_rows($querymaestros);
	
	if($rows == 1){
	
		while($user = mysqli_fetch_array($querymaestros)){
			
		$_SESSION['role'] = $user['role'];
	  	
	  	if($_SESSION['role'] == 2){
			
			$querymaterias = mysqli_query($con,"SELECT * FROM materias WHERE maestros_id='".$user['maestros_id']."'");  	
		  	
		  	while($mid = mysqli_fetch_array($querymaterias)){
			$_SESSION['maestros_id'] = $mid['maestros_id'];		  	
		  	}
		  	
	  	}elseif($_SESSION['role'] == 1){
			
		$_SESSION['maestros_id'] = $user['maestros_id'];		  	
		  	
	  	}
	  	
	  	
	  	$_SESSION['username'] = $user['maestros_fname'].' '.$user['maestros_lname'];
		
		
			
		echo '<meta http-equiv="refresh" content="0; URL=\'../index.php\' " />';
		
		
			
		}
		
	}elseif($rows < 1){
		
		echo '<meta http-equiv="refresh" content="0; URL=\'../login.php?signin=failed\' " />'; 
	}
	
	
?>