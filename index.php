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
// POST is a superGlobal associative array
// runs only if the $_POST['submit'] property exists
// kinda like a js event handler
if(isset($_POST['submit'])){
	// setting the inputed username to the one that will
	// be posted to database
	$username = $_POST['username'];
	// selecting the username that matches
	$query = "SELECT username FROM users WHERE username=?";
	// setting $stmt to stmt_init() propert of the $mysqli class
	$stmt = $mysqli->stmt_init();
	//  Initializes a statement and returns an object for use with mysqli_stmt_prepare
	if(! $stmt->prepare($query)) /* prepares the sql statement for execution */{
	    dd('query unsuccessful');
	} else {
		// binds parameters to a prepared statement the s specifies the type of variables
		// the parameters are the things your querying from the database
		$stmt->bind_param("s", $username);
		// excecutes the statement
        $stmt->execute();
        // bind the variables for storage
        $stmt->bind_result($result);  
        // setd $ data to the fatched data from the statement
        $data = $stmt->fetch();
        // if the fetch was unsuccessful diplay error message
        if($data == false) die('No results found.');
        // as long as the username provided matches the result form the database
        // and the auth property is set to true, redirect user to home page
        while($data){
        	$_SESSION['username'] = $result;
		    $_SESSION['auth'] = true;
		    header('Location: private.php');
		    die('');
		}

	}
	// you have to close the statements and the mysqli connection
	$stmt->close();
    $mysqli->close();
}

ob_end_flush();