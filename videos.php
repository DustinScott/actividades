<?php include 'includes/head.php';
	
	
	
	if(!empty($_GET['cid_return'])){
	echo '<input type="hidden" id="cid_return" value="'.$_GET['cid_return'].'">';	
	}

	// Set off-canvas
	include 'includes/offcanvas_TOP.php';

	if(empty($_SESSION['role'])){
	
	echo '<meta http-equiv="refresh" content="0; URL=\'login.php\' " />';
	
	}elseif(!empty($_SESSION['role'])){
		
	// $wer = where is this person allowed to go	
	$wer =  $_SESSION['maestros_id']; 	
	
	?>
	<div class="row text-center">
	<br/>
	<div id="AjaxResult">  </div>
	
	</div>
	
	
	
	<div class="large-4 columns">
				
				<select id="sel_A_vid">
					
					<?php 
						
						$getActividades = mysqli_query($con,"SELECT * FROM actividades");
						while($A = mysqli_fetch_array($getActividades)){
							echo '<option value="'.$A['actividad_id'].'">'.$A['actividad_name'].'</option>';
						}
						
					?>
					
						</select>
						
							</div>
							
																<!-- ************ END class="large-4 columns" ************** -->				
		
			<div class="large-4 columns">
				<select id="sel_H_vid">
				
				<?php 
					
					$getHerramientas = mysqli_query($con,"SELECT * FROM herramientas");
					while($H = mysqli_fetch_array($getHerramientas)){
						echo '<option value="'.$H['herramientas_id'].'">'.$H['herramientas_name'].'</option>';
					}
					
				?>
				
						</select>
							
							</div>
							
																<!-- ************ END class="large-4 columns" ************** -->
			
			<div class="large-2 columns">
				<a href="#" id="uploadVideo" class="button success radius tiny right" style="width:100%;"> Subir </a>
					</div>
					
																<!-- ************ END class="large-2 columns" ************** -->
			
			
			
			<div class="large-2 columns">
				<a href="tablas.php" id="refresh" class="button secondary radius tiny right" style="width:100%;"> REFRESH </a>
					</div>
					
																<!-- ************ END class="large-2 columns" ************** -->
			<hr />



<div class="large-12 small-12 columns" id="display:none;">		
		<fieldset class="dropVids"> 
    <legend><h2>Videos</h2></legend>
    
		<div></div>
		
	</fieldset>	
</div>



	<?php
	}
	
	echo '<hr />';
	echo '<div class="large-12 columns">';
	$queryVids = mysqli_query($con,"SELECT * FROM captivates ORDER BY cap_title ASC");
	
	echo '<table>
		  <thead>
		    <tr>
		      <th>Activity</th>
		      <th>Herramienta</th>
		      <th>File</th>
		      <th>X</th>
		    </tr>
		  </thead>
		  <tbody>';

	while($vShow = mysqli_fetch_array($queryVids)){
		
		
		    echo '<tr id="'.$vShow['cap_id'].'">
		    
		      <td id="a">';
		      
		      $queryActivity = mysqli_query($con,"SELECT * FROM actividades WHERE actividad_id='".$vShow['cap_activity']."'");

				  while($act = mysqli_fetch_array($queryActivity)){
					  echo $act['actividad_name'];
				  }
		      
		      echo '</td>';
		    
		      echo '<td id="h">';
		      $queryHerramienta = mysqli_query($con,"SELECT * FROM herramientas WHERE herramientas_id='".$vShow['cap_herra']."'");

				  while($her = mysqli_fetch_array($queryHerramienta)){
					  echo $her['herramientas_name'];
				  }
		      
		      
		      
		      echo '</td>
		      <td>'.$vShow['cap_file'].'</td>
		      <td><a id="del_vid" href="#" data-reveal-id="confirm_deletion"><i class="fa fa-trash-o" aria-hidden="true" ></i></a></td>
		    </tr>';
		   
		  


	
	
	}
	
	echo '</tbody>
		</table>';
		
	echo '</div>';	
	
	?>
	

<div id="confirm_deletion" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
 
  <div class="large-6 large-centered columns text-center">	
<h1>Favor de Confirmar</h1>	  
  <div id="WhichVidDel"></div>
  <br />
  
  <input type="hidden" id="reallyDelthis" >
  
  <a id="reallyDel" class="button small alert radius alert">CONFIRMAR</a>

</div>
	
	
	<?php include 'includes/footer.php'; ?>    
	
	<?php include 'includes/pagebase.php'; ?>    
	
		<script>
		
		$(document).on('click','#del_vid',function(){
		
		var tr = $(this).parent().parent().attr('id');
		var a = $(this).parent().parent().children('td#a').html();
		var h = $(this).parent().parent().children('td#h').html();	
		
		$('#WhichVidDel').html('Al Confirmar se eliminanara <span>' + a +' - '+ h + '</span>');

		$('#reallyDelthis').val(tr);
		
		
			$(document).on('click','#reallyDel',function(){

				var whatdel = $('#reallyDelthis').val();
				$.post('includes/delvids.php',{delvid:whatdel},function(data){
				
					//alert(data);
					$('#confirm_deletion').foundation('reveal', 'close');
					
					location.reload();
				});
				
			});
		
		});
		
		</script>
		
		
	
	
