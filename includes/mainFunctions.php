<?php
	
	function qhtml($conx,$wA,$wM,$fUN){
		
	$sql = 'SELECT * FROM clase_files WHERE file_name="'.$wA.'" AND file_material="'.$wM.'" AND file_unidad='.$fUN.'';
	$MQ = mysqli_query($conx,$sql);
	
		
		while($w = mysqli_fetch_array($MQ)){
		 return $w['clase_file_id'];	
		}
		  
	}
	
	function qquery($conx,$table,$where,$Where_arg,$whileval){
		
	$sql = "SELECT * FROM ".$table." WHERE ".$where."=".$Where_arg." ";
	$MQ = mysqli_query($conx,$sql);
		
		while($w = mysqli_fetch_array($MQ)){
		 return $w[''.$whileval.''];	
		}
		  
	}
	
	function qfiles($conx,$table,$where,$Where_arg,$fileType,$whileval){
	$sql = "SELECT * FROM ".$table." WHERE ".$where."=".$Where_arg." AND file_type='".$fileType."'";
	$MQ = mysqli_query($conx,$sql);
		$echo = array();
		
		while($w = mysqli_fetch_array($MQ)){
		 $echo[] = $w[''.$whileval.''];	
		 
		}
		 return $echo;
		 
	}
	
	function ht($h,$cnt){
		echo '<'.$h.'>'.$cnt.'</'.$h.'>';
	}
	
	// HTML TEXT FUNCTIONS
	function get_extension($file) {
				 return $extension = end(explode(".", $file));
				 
				}
				
	function HR($grosor,$color){
		echo '<hr / style="border:'.$grosor.'px solid '.$color.';">';
	}
	
	function EB($classNameForEditor){
		echo '<i class="'.$classNameForEditor.' fa fa-ellipsis-h fa-lg right editDots right-off-canvas-toggle" aria-hidden="true"></i>';
	}
	
	function EB_SHARE($classNameForShare){
		echo '<i class="'.$classNameForShare.' fa fa-share-alt fa-lg right shareLink aria-hidden="true"></i>';
	}
	
?>