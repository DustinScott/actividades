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
	
	<div id="pageSTART" class="row"> <!--START ROW 1 -->
		
		<br />
		
		<img src="http://leavirtual.com/assets/img/LeavVirtualLogo_web.png" width="20%">
		
		<hr />
		
		<div class="large-8 columns">
		
			<div class="TableCode"> <!--START class TableCode -->
		
		
			
			
			<div class="large-4 columns">
				
				<select id="sel_A">
					
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
				<select id="sel_H">
				
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
				<a href="#" id="uploadTabla" class="button success radius tiny right" style="width:100%;"> Subir </a>
					</div>
					
																<!-- ************ END class="large-2 columns" ************** -->
			
			
			
			<div class="large-2 columns">
				<a href="tablas.php" id="refresh" class="button secondary radius tiny right" style="width:100%;"> REFRESH </a>
					</div>
					
																<!-- ************ END class="large-2 columns" ************** -->
			<hr />
			
			<textarea rows="30" id="textareaTabla"></textarea>
			
																
			
			
		</div> <!--END class TableCode -->
		
		<div class="large-4 columns">
		<a href="#" id="runit" class="button alert tiny radius">PREVIEW</a>
		</div>
		
			<hr/>	
	<div class="PreviewTable">
			
			
			
			</div>
			
			</div>
			
			<div class="large-4 columns">
				
				
			<?php 
			
			$getTables = mysqli_query($con,"SELECT * FROM tables");
			$no = 1;
			$nm = 1;
			while($tbls = mysqli_fetch_array($getTables)){
				
				$an = '';
				$hn = '';
				
				$getActividadesName = mysqli_query($con,"SELECT actividad_name FROM actividades WHERE actividad_id='".$tbls['tables_actividad']."'");
				
				while($gan = mysqli_fetch_array($getActividadesName)){
					
					$an .= $gan['actividad_name'];
					
				}
				
					


				
				$getHerName = mysqli_query($con,"SELECT herramientas_name FROM herramientas WHERE herramientas_id='".$tbls['tables_hermamientas']."'");
				
				while($gan = mysqli_fetch_array($getHerName)){
					
					$hn .= $gan['herramientas_name'];
					
				}
				
				
				echo '<ul class="accordion" data-accordion>
  <li class="accordion-navigation">
    <a href="#panel'.$no++.'a">'.$an.' / '.$hn.'</a>
    <div id="panel'.$nm++.'a" class="content">
    <div id="tableCode">
    '.$tbls['tables_code'].'
    
    </div>
    <hr />
    <a href="includes/delTabla.php?delTabla='.$tbls['tables_id'].'" class="button alert"><i class="fa fa-trash" aria-hidden="true"></i></a>
    <a href="#pageSTART" id="edittablecodebutton" class="button tiny radius">EDIT</a>
    </div>
  </li>
  </ul>';
				
								
			}
				
				
			?>
				
				
			</div>
		
	</div>	<!-- END ROW 1 -->


	<?php
	}

	?>
	
	<?php include 'includes/footer.php'; ?>    
	
	<?php include 'includes/pagebase.php'; ?>    
	
	<script>
		
		$(document).on('click','#edittablecodebutton',function(){
			
			var tablecode = $(this).siblings('div#tableCode').html();
			$('#textareaTabla').html(tablecode);
			
			
			
		});
		
	</script>
	
	
	
	




