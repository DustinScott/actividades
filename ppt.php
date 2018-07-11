<?php include 'includes/head.php';?>


<?php


$id_ofclase = $_GET['id'];

$in = mysqli_query($con,"SELECT plantilla FROM clase_files WHERE clase_file_id=".$id_ofclase."");

while($ins =  mysqli_fetch_array($in)){
	echo $ins['plantilla'];
}


?>




<?php include 'includes/pagebase.php';?>

