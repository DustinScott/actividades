<?php include 'includes/head.php';
	
		$getunidad = $_GET['unidad'];
		
		
	
?>

<?php 
	
	if($_SESSION['role'] == 2){
	
	echo '<meta http-equiv="refresh" content="0; URL=\'index.php\' " />';
	
	}elseif($_SESSION['role'] == 1){
	?>

    <div class="row">
      <div class="large-12 columns" style="">
<?php	      
			 include('includes/mainNav.php');
?>
	      
        <h1>Temarios</h1>
      </div>
    </div>



<div id="myModal" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
  
  <?php include 'includes/temariosform.php';?>
  
  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>
    
    

    <div class="row">
	<?php include 'includes/temariosTable2.php';?>
	</div>
	
	
	
<?php include 'includes/footer.php'; ?>    
<?php include 'includes/pagebase.php'; }?>
