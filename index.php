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

	


	
	
	

	<div class="large-3 medium-3 small-12 columns">
	
		
		
	<br />
	
<?php
	
	
	
	echo '<div id="newMateriaArea">';	

	echo '</div>';
	
	echo '<div id="msgC"></div>';
	
	echo '<div id="listofclases">';	
	
	echo '</div>';
	
	if($_SESSION['role'] == 1){
	include 'includes/siteTools.php';
	}
	?> 
	
	<hr / style="border:0px;">
	
<ul class="accordion" data-accordion role="tablist">	
 <li class="accordion-navigation">
    <a href="#panel3d" role="tab" id="panel1d-heading" aria-controls="panel3d" class="mainSiteMenuAccordian"><div class="large-2 columns" style="border-right:1px solid #333;"><i class="fa fa-sign-out" aria-hidden="true"></i></div> <div class="large-10 columns"><?php echo $_SESSION['username'];?></div></a>
 
    <div id="panel3d" class="content" role="tabpanel" aria-labelledby="panel1d-heading">
      <a href="includes/signout.php">Sign Out</a>
    </div>
  
  </li>
  
 
  
</ul>

	
	</div>
<!-- <div class="large-3 medium-3 small-5 columns"> -->

<div class="large-9 medium-3 small-12 columns" >
	<br />
	

	
	<div class="large-12 columns classData" style="border-left:1px dotted #ccc; min-height:500px;">
		<div class="large-6 large-centered columns text-center">
			<br />
						<br />
									<br />
			<?php
			if(isset($_GET['updated'])){
				echo '<h1 style="color:#ccc;">ACTUALIZACION EXITOSA</h1>';
				echo '<hr />';
				$file = $_GET['updated'];
				$ext = end(explode(".", $file));
				
				echo '<img src="img/'.$ext.'.png">';
				echo '<br />';
				echo $file;
				
				
			}else{	
			?>
			<br />
			<img src="http://leavirtual.com/assets/img/LeavVirtualLogo_web.png">
			
			<?php }?>
		</div>
		
		
	</div>
	
	
	
	
</div>



<div id="iframe_code" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
  
  <div id="iframe_code_snippet" class="text-center">
  
  
  </div>
  
  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>


<div id="addhtmlcodehere" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
	
	
	
	<div id="PlantillaMsg" class="large-12 columns" style="display:none;">
		
	</div>	
	
 
  <div class="large-12 columns">
  <h3>HTML Converter</h3>
  
  
  
  <hr />
  
  <input type="text" id="NewCodeTitle" placeholder="Title of Code">
  <p>Añadir Codigo Abajo</p>
  
  

	
	
	  <hr / style="border:0px;">
  
  <textarea rows="10" id="showPreview_code"></textarea>
  <button id="convert_code" class="tiny radius" style="background:rgb(52,170,220);">Vista Previa</button>
  
  <button id="store_code" class="right tiny radius" style="background:rgb(255,73,129); display:none;">Guardar</button>
  
  </div>
  <div class="large-12 columns"><h4 id="template_name"></h4></div>
  
  <div id="showPreview_html" class="large-12 columns">
  
  </div>	  
	  
</div>




<?php include 'includes/footer.php'; ?>    





<?php include 'includes/pagebase.php'; }
	
	//echo mysqli_error($con);
	
?>


