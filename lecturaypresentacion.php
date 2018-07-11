<form id="multi_uploader_form" action="includes/multiUploader.php" method="post" enctype="multipart/form-data">
<input type="hidden" name="class_id_multi_upload" value="<?php echo $clase_id; ?>">	
<input class="files_input" style="display:none;" type='file' name="F_AFL[]" id="lectura_insert" multiple>
			
			
<input style="display:none;" type='file' name="F_AFP[]" id="present_insert" multiple>  

<div  class="large-6 columns" style="padding-left:0px;">
<div class="button radius secondary small large-12 columns" id="lectura_didact">
<i class="fa fa-file-text-o fa-lg" aria-hidden="true"></i> Lectura</div>
<ul id="lec_files" class="no-bullet">

</ul>
</div>

<div class="large-6 columns" style="padding-right:0px;">
<div class="button radius secondary small large-12 columns" id="present_didact">
<i class="fa fa-file-powerpoint-o fa-lg" aria-hidden="true"></i> Presentación</div>

<ul id="pres_files" class="no-bullet">
	
</ul>
</div>
<hr / style="border:0px;">
<a href="#" id="multi_uploader_go" class="button small radius" style="background:#2EA7C9;">Guardar</a>
</form>



