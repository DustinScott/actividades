<?php include '../includes/ewp.php';
	
	if(!empty($_POST['fl_id'])){
		$fl_id = $_POST['fl_id'];
	}
	echo '<h5 style="color:#1d77ef;">Archivos</h5>';
	echo '<ul class="no-bullet">';
	
	
	$queryFiles = mysqli_query($con,"SELECT * FROM html WHERE clase_files_id='$fl_id'");
	while($files  = mysqli_fetch_array($queryFiles)){
		
	echo '<a href="#" data-reveal-id="editHtml" class="html_id_list button small secondary" style="width:100%;" id="'.$files['html_id'].'"><li style="font-size:14px; padding-top:10px; padding-bottom:10px; color:#1F1F21;"><i class="fa fa-file-code-o" aria-hidden="true"></i> '.$files['html_course_title'].'</li></a>';
	
	}
	
	
	
	echo '</ul>';
	
	echo '
<div id="editHtml" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">

  <hr / style="border:0px;">
  <div id="CodeUpdateResults" class="large-12 columns text-center" style="color:green;"></div>
  <div id="updateHTML">

  </div>
  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>';
	
	?>