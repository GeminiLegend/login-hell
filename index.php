<?php require_once('lib/config.php'); ?>

<?php require('header.php'); ?>
	<p>You need to fill in a <strong>Username</strong> and a <strong>Password</strong>!"</p>
	<!-- Create form, notice php in value creates sticky form -->
	<form action="" method="post">
		<div>
			<input type="text" name='username' placeholder='Username' value='<?php if(isset($_POST['username'])) echo $_POST['username']; ?>'>
			<input type="text" name='password' placeholder='Password' value='<?php if(isset($_POST['password'])) echo $_POST['password']; ?>'>
			<input type="submit" name='submit' value='submit'>
		</div>
	</form>
	<!-- next todo: -->
	<ul id='helpLinks'>
		<li><a href="register.php">Register</a></li>
		<li><a href="forgot.php">Forgot Password</a></li>
	</ul>
<?php require('footer.php'); ?>

<?php

require 'lib/login.php';

ob_end_flush();