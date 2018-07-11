 <!--  Videos -->




			<div id="videosForm" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
			 <div class="row">
			  <h2 id="modalTitle">Add Videos</h2>
			   <div class="row collapse prefix-radius">
		       	
		       	<label><h4>Video 1</h4></label>
		       	<input type="text" name="vid_1_titulo" placeholder="Titulo">
		       	
		       	<div class="small-3 columns">
		          <span class="prefix">Video 1</span>
		        </div>
		        
		        <hr />

		        <div class="small-9 columns">
		          <input type="text" name="AFV_one" placeholder="Insertar Embed">
		        </div>		        
		     
		      
			</div>
			
			</div>
			<!-- Material & Unidad Associated with This -->
			<input type="hidden" name="material_assoc" value="<?php echo $claseMat;?>">
			<input type="hidden" name="unidad_assoc" value="<?php echo $claseUni;?>">
			
			<a href="#" class="vidUploader button radius small">Subir</a>
			  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
			</div>


<!--  Files -->



<div id="Files" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
  <h2 id="modalTitle">Add Files</h2>
  <?php include('../lecturaypresentacion.php');?> 
  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>	

<!-- // ***********************************  //
//////////// Activity Creator ///////////// 
// 	***********************************  // -->

<div id="Class" class="reveal-modal ActivityCreator" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
<a class="close-reveal-modal" aria-label="Close">&#215;</a>
<br />
<hr />
 			<div class="large-6 columns">
		  	<h2 id="modalTitle">Actividad</h2>
		  	
		  	<i style="font-size:12px; color:#333;">Selecciona una Actividad para reforzar el contenido del Tema.</i> 
		  	</div>
		  	
		  	<div class="large-6 columns">
	 		
 			
	 		<h4 class="right">INTEGRADORA</h4>
		 	
		 	<hr / style="border:0px;">
		 		
		 		<div class="right">
			 	
				 	<label class="switch">
		     		
			     		<input id="checkboxSlider" type="checkbox">
					    
					    <span class="slider"></span>
					    
				    </label>
					
				</div>
		 		
	 		</div>
 			
		<hr />  	
		  
<div class="large-12 small-12 columns">
	
	<fieldset>
    <legend><h2>Paso 1 </h2></legend>
    
    		
    		<div class="large-12 columns">
	    	
	    	<h5>Nombrar este Ejercicio o Examen</h5>	
	    	<input type="text" id="nameofactivity"/ placeholder="FAVOR NO MAS DE 50 CHARACTERES">
    		
    		</div>
    		<br />
    </fieldset>
		 
		    
			  <fieldset>
    <legend><h2>Paso 2 </h2></legend>
    
    		
    		
    		
			<div class="large-6 columns">
				<select id="actividad_choice" class="AFA" name="AFA">
				<option selected="true" disabled="disabled">Escoge Actividad</option>
				
					          
				
				<?php mysqli_set_charset( $con, 'utf8');
				$get_activities = mysqli_query($con,"SELECT * FROM actividades");
				while($acts = mysqli_fetch_array($get_activities)){
					echo '<option value="'.$acts['actividad_id'].'">'.$acts['actividad_name'].'</option>';
				}
		    	?>
				</select>
			
			</div>
			
			
			
		<div class="large-6 columns">  
		     
		     <select id="herramientas_list" class="AFH" name="AFH">
		       <option selected="true" disabled="disabled">Escoge una Herramienta</option>
		      </select>
		   
		 </div>
	
		</fieldset> <!-- END PASO 1-->
		
		
</div>

<div class="large-12 small-12 columns">
	<fieldset>
    <legend><h2>Paso 3 </h2></legend>	

	<div class="large-12 small-12 columns text-center">Revisar Instrucciones<hr / style="border:0px;"></div>
	<!-- AJAX :  Herramientas will appear here  -->
	
		<div id="IforV" style="font-size:12px; color:#333;"  class="large-6 columns"></div>	    
	
		<div id="IforH" style="font-size:12px; color:#333;"  class="large-6 columns">Instructions</div>
<!-- 	<a href="img/Plantillas_Examens/Plantilla%20_%20Foro%252FForo.docx">Plantilla</a> -->

<br />
<br />
<br />
</fieldset>	
</div>

<div class="large-12 small-12 columns">
	<fieldset>
    <legend><h2>Paso 4 </h2></legend>	

	
	<div class="large-12 small-12 columns text-center">Añadir Instrucciones<hr / style="border:0px;"></div>
			
		<div id="ata" name="AIS">
		
		
		
		</div>

</fieldset>	
</div>

<div class="large-12 small-12 columns">		
		<fieldset class="dropzone"> 
    <legend><h2>Paso 5 </h2></legend>
    
		<div></div>
		
	</fieldset>	
</div>


	
	<div class="large-12 small-12 columns">
		
<!-- 		<a href="#" class="alert tableConverter button small round right">Test Tabla</a> -->
		
		<a href="#" id="createActivity" class="button small radius closeActivityCreator" style="background:#2EA7C9;">ENVIAR</a>
		
		<a href="#" id="cancelActivityCreation" class="button small radius" style="background:#000;">Cancelar</a>
		
		<input id="hiddencloser_haha_te_cerre"type="hidden" class="close-reveal-modal">
	</div>	
	
	
</div>





</div>		    

  <script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    
    <script>
      $(document).foundation();
    </script>

			