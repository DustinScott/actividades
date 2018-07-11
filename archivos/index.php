<?php include 'includes/head.php';?>
	
<!-- <div style="min-height: 1000px">	 -->
	

<div class="off-canvas-wrap" data-offcanvas >
 

  <div class="inner-wrap">

  
    

    <!-- Off Canvas Menu -->
    <aside class="left-off-canvas-menu" style="background:#efefef;">
	<br />
	<img src="http://leavirtual.com/assets/img/LeavVirtualLogo_web.png">
    <br />
    <ul class="accordion" data-accordion="myAccordionGroup" >
	    
	   		<?php
		   
		    $getMaterias = mysqli_query($con,"SELECT * FROM materias");
		    
		    while($mats = mysqli_fetch_array($getMaterias)){
			   
			   echo '<li id="listofmats" class="accordion-navigation">
			   
				        <a class="materias" href="#materia_'.$mats['materia_id'].'">'.$mats['materia_nombre'].'</a>
				        <div id="materia_'.$mats['materia_id'].'" class="content" style="padding-top:25px; padding-bottom:-15px;">
				          
				        </div>
				      </li>';
			}
	   		
	   		?> 
	    
      
          </ul>
	
	
	
  	</aside>

  	<div class="large-12 columns" style="min-height:1000px;">
	
	<a class="left-off-canvas-toggle carpetas" href="#" > <i class="fa fa-list" aria-hidden="true"></i> Carpetas</a>
    
    <div class="large-12 columns" id="displayStoredImages" style="padding:0px;">
							
		</div>
	<div id="pictureplace" class="dropzone">
		
		
				
			
	</div>
	
	</div>
	
  <a class="exit-off-canvas"></a>

  </div>
</div>	


	<script src="js/vendor/jquery.js"></script>
	<script src="js/dropzone.js"></script>
    <script src="js/foundation.min.js"></script>
    <script src="js/jquery.truncate.js"></script>
    
    
    <script src="js/custom.js"></script>
    
    <script>
      $(document).foundation();
    </script>
    
    <script>
	var matID = [];    
    $(document).on('click','.materias',function(){
	    
	   var digit = $(this).attr("href").split("_").pop();
	   var unidadesHome = $(this).siblings('#materia_'+digit+'');
	   
	   matID = digit;
	   
	   $.post('includes/requests.php',{materia_id:digit},function(data){
	   
	   $(unidadesHome).html(data);	
	   
	   });
	   
	   
    });
    
    
    </script>
    
    <script>
	    
    var unID = [];
    
		$(document).on('click','.chop', function(){
				    
				var unidad = $(this).attr('id');
				    
				unID = unidad;
				
				$.post('pictureplace.php',{unID:unID},function(data){
					$('#displayStoredImages').html(data);
				});
				    
				$("#pictureplace").dropzone({ 
						    
			    url: "uploadFiles.php",
				paramName : "images",
							
					init: function() {
							
				
							this.on("sending", function(file, xhr, formData) {
						      formData.append('unidad_id',unID);
						      formData.append('materia_id',matID);
						      //add another 'formData'..if ya need it bro!! ;)
						    });
						    
						    this.on("queuecomplete", function(){
						    
						     //alert("All files have uploaded ");
						    $('#displayStoredImages').load('pictureplace.php',{unID:unID});
						    });
							
					}			     
				});	
	    });

	</script>
    
   
    
  
    
    
  </body>
</html>