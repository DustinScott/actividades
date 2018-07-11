<?php include '../includes/ewp.php';
	
	if(!empty($_POST['pickedfile'])){
		$html_id = $_POST['pickedfile'];
	}
	
	
	
	$queryFiles = mysqli_query($con,"SELECT * FROM html WHERE html_id='$html_id'");
	
	while($files  = mysqli_fetch_array($queryFiles)){
		
	$file_id = $files['clase_files_id'];	
	
	
	
	///////////////////////////////////////////
	////// SECTION SHOWS THE ORGINAL FILE /////
	///////////////////////////////////////////
	
	echo '<div class="large-2 columns" style="border-right:1px dotted #ccc;" padding:0px;>';
	
	$origFile = mysqli_query($con,"SELECT * FROM clase_files WHERE clase_file_id='$file_id'");
	
	while($org = mysqli_fetch_array($origFile)){
		
		  $orgFile = $org['file_name'];
		  $ext = pathinfo($orgFile, PATHINFO_EXTENSION);
		 
		  echo '<div class="text-center">';
		  echo '<img src="img/'.$ext.'.png">';
		  echo '<h5 style="font-size:12px;">'.$orgFile.'</h5>';
		  echo '</div>';
		  
		  echo '<div id="ptsc" class="large-12 columns " style="display:none; padding:0px;">
	
	<textarea id="showiframesnippet" rows="10"><iframe frameborder="0" width="100%" height="1300px" src="http://leavirtual.com.mx/actividades/pptx.php?id='.$html_id.'"></iframe></textarea>
	
	
	<button id="coptythissnippet" class="button secondary tiny right"><i class="fa fa-clone" aria-hidden="true"></i></button>
	</div>';
	}
	
	echo '</div>';
	
	////////////////////////////////////////////////
	////// SECTION ALLOWS EDITING OF ORIG FILE /////
	////////////////////////////////////////////////
		
	echo '<div class="large-10 columns">';
		
	echo '<input type="hidden" id="html_code_id" value="'.$html_id.'">';
	
	echo '<h4>'.$files['html_course_title'].'</h4>';
	
	echo '<textarea id="theHtmlCode" rows="20">'.$files['html_code'].'</textarea>';
	
	echo '<a href="#" id="convertCode" class="button secondary tiny success" style="background:#e4b7f0;">Ver Cambios</a>';
	
	echo '<a href="#" id="sharethiscode" class="button secondary tiny success" style="background:#1ad6fd;"><i class="fa fa-share" aria-hidden="true"></i></a>';
	
	
	
	echo '<div id="PreviewUpdatedCode" style="display:none;">';
			echo '</div>';
	
	echo '<div class="large-4 columns right" style="padding:0px;">';
	
	echo '<a href="#" id="SaveCodeCancel" class="large-10 columns button success tiny " style="display:none;">Guardar</a>';
	
	echo '<a href="#" id="convertCodeCancel" class="large-2 columns button secondary tiny text-center">X</a>';
	
	echo '</div>';
	
	echo '<hr / style="border:0px;">';
	
			
			
	
	echo '</div>'; 
	
	
	
	}
	echo '
	<script src="js/vendor/jquery.js"></script>
    <script src="js/foundation.min.js"></script>
    <script src="js/foundation/foundation.offcanvas.js"></script>
    <script src="js/dropzone.js"></script>
    <script>
      $(document).foundation();
    </script>
	';
	
?>

<script>
	
	$(document).on('click','#sharethiscode',function(){
		
		$('#ptsc').slideDown();
		
 		
	
	});
	
	$(document).on('click','#coptythissnippet',function(){
    
    $("#showiframesnippet").select();
    document.execCommand('copy');
    
    $(this).html('<i class="fa fa-check-circle fa-lg" aria-hidden="true"></i> ')
});

</script>