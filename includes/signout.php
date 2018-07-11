<?php include 'ewp.php'; 

session_unset($_SESSION['username']);
session_destroy($_SESSION['username']);

echo '<meta http-equiv="refresh" content="0; URL=\'../index.php\' " />';
			


?>