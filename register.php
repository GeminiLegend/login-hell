<?php require_once('lib/config.php'); ?>

<?php require('header.php'); ?>

	<p>Please enter your desired username and password</p>
	<form action="" method="post">
		<div>
			<input type="text" name='username' placeholder='Username' value=''>
			<input type="text" name='password' placeholder='Password' value=''>
			<input type="text" name='email' placeholder='Email' value=''>
			<input id='register' type="submit" name='register' value='register'>
		</div>
	</form>

<?php require('footer.php'); ?>

<?php
if(isset($_POST['register'])){
	$username 	= $_POST['username'];
	$password 	= $_POST['password'];
	$email 		= $_POST['email'];

	// $query = $mysqli->query("INSERT INTO users ( `username`, `password`, `email`) VALUES ( $username, $password, $email)");
	$sql = "INSERT INTO `users` ( `username`, `password`, `email`) VALUES ('".$username."','".$password."','".$email."')";
	$query = $mysqli->query($sql);
	if($query == true) {
		echo "Thank you $username. Your registation information has been sent to the matrix database";
	} else {
		echo $mysqli->error;	
	}
	
}
ob_end_flush();
