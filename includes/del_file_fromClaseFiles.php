<?php include 'ewp.php';

$theKillNo = $_POST['theKillNo'];
$unlink = $_POST['unlink'];

$delClassFiles = mysqli_query($con, "DELETE FROM clase_files WHERE clase_file_id='".$theKillNo."'");
	
unlink($unlink);
?>