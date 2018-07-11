<div class="row">
	 <div class="large-12 columns" style="background:#ddd;">
	
	 							<?php 
						        
						        $get_her = mysqli_query($con,"SELECT * FROM herramientas");
						        while($herr = mysqli_fetch_array($get_her)){
							         
							         //echo $herr['actividad_id'];
							         
							         $herr['actividad_name'];
							          
							         $allof = $herr['actividad_id'];
							          
						          
							         $herrx = explode(",", $allof);
							         
							         if(in_array('5',$herrx)){
								          //echo $herrx[0];
								          echo $herr['herramientas_name'];
								          echo '<br />';
							         }
							         
							          	
						        }
						        
					          	
					          	?>
	</div>
</div>
 