<?php include 'ewp.php';
	
	$nombre = $_POST['nombre']; 
	echo '<br />Name is '.$nombre;
	
	$apellido = $_POST['apellido'];
	echo '<br />Apellido is '.$apellido;
	
	$email = $_POST['email'];
	echo '<br />Email is '.$email;
	
	$password = $_POST['password'];
	echo '<br />Email is '.$password;
	
	$telefono = $_POST['telefono'];
	echo '<br />Email is '.$telefono;
	
	$role = $_POST['role'];
	echo '<br />Email is '.$role;
	
	$query = mysqli_query($con,"INSERT INTO maestros(maestros_fname,maestros_lname,maestros_email,maestros_telefono,pswd,role)VALUES('$nombre','$apellido','$email','$telefono','$password','$role')");
	
?>