<?php include 'ewp.php';
	
	$activity = $_POST['activity_change'];
	$her = $_POST['herr_chosen'];
	
	if(!empty($activity)){
	
		function getTablex($conx,$activity_x,$her_x){
		$queryHerr = mysqli_query($conx,"SELECT * FROM tables WHERE tables_actividad = ".$activity_x." AND tables_hermamientas = ".$her_x."");
		
			while($hx = mysqli_fetch_array($queryHerr)){
			
			echo  $hx['tables_code'];
				
			}
			
		}
	}	
	
	getTablex($con,$activity,$her);	
		

		   
	

		
   
   