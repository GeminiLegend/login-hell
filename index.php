<?php require_once('lib/config.php'); ?>

<link rel="stylesheet" type="text/css" href="./style.css">

<p>You need to fill in a <strong>Username</strong> and a <strong>Password</strong>!"</p>

<form action="" method="post">
	<div>
		<input type="text" name='username' placeholder='Username' value='<?php if(isset($_POST['username'])) echo $_POST['username']; ?>'>
		<input type="text" name='password' placeholder='Password' value='<?php if(isset($_POST['password'])) echo $_POST['password']; ?>'>
		<input type="submit" name='submit' value='submit'>
	</div>
</form>
<ul id='helpLinks'>
	<li><a href="register.php">Register</a></li>
	<li><a href="forgot.php">Forgot Password</a></li>
</ul>

<?php
if(isset($_POST['submit'])){
	$username = $_POST['username'];
	$query = "SELECT username FROM users WHERE username=?";

	$stmt = $mysqli->stmt_init();	
	if(! $stmt->prepare($query)){
	    dd('query unsuccessful');
	} else {
		$stmt->bind_param("s", $username);

        $stmt->execute();

        $stmt->bind_result($result);  
        
        $data = $stmt->fetch();
        if($data == false) die('No results found.');
        while($data){
        	$_SESSION['username'] = $result;
		    $_SESSION['auth'] = true;
		    header('Location: private.php');
		    die('');
		}

	}

	$stmt->close();
    $mysqli->close();
}

ob_end_flush();