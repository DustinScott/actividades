<?php include 'includes/head.php';?>


<?php


$id_ofclase = $_GET['id'];

$in = mysqli_query($con,"SELECT * FROM html WHERE html_id=".$id_ofclase."");

while($ins =  mysqli_fetch_array($in)){
	echo $ins['html_code'];
}


?>




<?php include 'includes/pagebase.php';?>

