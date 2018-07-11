<?php include 'ewp.php';
	
	

$Ci = $_POST['clase_id'];
$queryActividades = mysqli_query($con, "SELECT * FROM actividades_activos WHERE clase_id='$Ci'");

$numRows = mysqli_num_rows($queryActividades);



echo '<hr />';


echo '<table width="100%">
  <thead>
    <tr>
      <th width="30%">Nombre de Ejercicio</th>
      <th width="30%">Acitividad</th>
      <th width="30%">Herramienta</th>
      <th width="10%">Instruciones</th>
      
    </tr>
  </thead>
  <tbody>';




while($aX = mysqli_fetch_array($queryActividades)){
	$integradora = $aX['integradora'];
	$aidID = $aX['actividades_vivos'];
	$acid = $aX['actividad_name'];
	$herid = $aX['herramientas_name']; 
	$rn = $aX['random_id']; 
	
		    // GET Actividad
		    $findAct = mysqli_query($con,"SELECT * FROM actividades WHERE actividad_id='$acid'");
			
			
			$finalActName  = '';
			$finalHerName  = '';
			
			
			
			
			while($aid = mysqli_fetch_array($findAct)){
			
			$finalActName  .= $aid['actividad_name'];
			
			}
			
			//GET Herramienta Name
			
			$findHer = mysqli_query($con,"SELECT * FROM herramientas WHERE herramientas_id='$herid'");
			
			while($hid = mysqli_fetch_array($findHer)){
			
			$finalHerName  .= $hid['herramientas_name'];
			
		    }
		    
		    // START TABLE ROW and DUMP DATA IN td's
			echo '<tr id="'.$aidID.'" class="classrowdata" data-reveal-id="ClassIntrucciones">';
			
			
			
			if($integradora == 1 ){
				
				echo '<td id="td_ejercicioName" style="background:#1d77ef;">';
				
			}else{
				echo '<td id="td_ejercicioName">';
			}
			
			echo $aX['nameof'];
			
			echo '</td>';
	        echo '<td id="td_activityName">'. $finalActName .' </td>';
	        echo '<td id="td_herramientaName">'. $finalHerName .'</td>';
	        echo '<td class="text-center"><a href="#"><i class="fa fa-eye" aria-hidden="true"></i></a></td>';
	        
	        echo '<input id="input_randomId" type="hidden" value="'.$aidID.'">';
	        echo '<input id="input_real_randomId" type="hidden" value="'.$rn.'">';
	        
	        echo '</tr>';
	
   
    
    }
	

echo '</tbody>
</table>
<hr />
<div>';
	
	
	
	

?>


<div id="ClassIntrucciones" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
  
  <div id="ActivitDataSection">

	  <div id="HeaderDataActivity">Activity</div>	
	 
	  <div id="showdatafromclassrowdata"></div>
	 
	  <hr / style="border:0px;">
	  
	  <a id="deleteActivityXX" href="#" class="button small radius secondary right">
		  
		  <i class="fa fa-trash-o fa-lg" aria-hidden="true"></i>
		  
	  </a>
  
  </div>
  	
  	  <div id="confirmActivityDeletSection" style="display:none;">
	  <h1> Favor de Confirmar </h1>
	  <hr />
	  
	  <p style="font-size:18px;">Este Accion es Irreversible, despues de confirmar <strong><u>YA NO SE PODRA RECUPERAR</u> </strong> este actividad ni sus archivos relacionados.</p>
	  <hr / style="border:0px;">
	  <a href="#" id="confirm_deleteActivity" class="button small radius alert left" ><i class="fa fa-trash-o fa-lg" aria-hidden="true"></i></a>
	  <a href="#" id="cancel_deleteActivity" class="button small radius" style="background:#000;color:#fff;margin-left:5px;">Cancelar</a>
	  
	  </div>
	
	  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
	

</div>

	<script src="js/vendor/jquery.js"></script>
	<script src="js/foundation/foundation.js"></script>
	<script src="js/foundation/foundation.accordion.js"></script>
	<script src="js/dropzone.js"></script>
		
    <script>
    $(document).foundation();
    
    $(document).on('click','.integradora',function(e){
	 e.preventDefault();   
    })
      
    </script>
    
    


