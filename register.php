<link rel="stylesheet" type="text/css" href="tut_files/style.css"> 

You need to fill in all of the required fields!"; }
else{
	if(strlen($username) > 32 || strlen($username) < 3){
		echo "<center>Your <strong>Username</strong> must be between 3 and 32 characters long!</center>"; }
	else{
		$res = mysql_query("SELECT * FROM `users` WHERE `username` = '".$username."'"); $num = 
		mysql_num_rows($res); 

		if($num == 1){
			echo "<center>The <strong>Username</strong> you have chosen is already taken!</center>"; }
		else{ 
			if(strlen($password) < 5 || strlen($password) > 32){
				echo "<center>Your <strong>Password</strong> must be between 5 and 32 characters long!</center>"; }
			else{
				if($password != $passconf){
					echo "<center>The <strong>Password</strong> you supplied did not match the confirmation password!</center>"; }
				else{
					$checkemail = "/^[a-z0-9]+([_\\.-][a-z0-9]+)*@([a-z0-9]+([\.-][a-z0-9]+)*)+\\.[a-z]{2,}$/i";
					if(!preg_match($checkemail, $email)){
						echo "<center>The <strong>E-mail</strong> is not valid, must be name@server.tld!</center>"; }
					else{
						$res1 = mysql_query("SELECT * FROM `users` WHERE `email` = '".$email."'"); $num1 = mysql_num_rows($res1); 

						if($num1 == 1){
							echo "<center>The <strong>E-mail</strong> address you supplied is already taken</center>";}
						else{
							$registerTime = date('U'); 
							$code = md5($username).$registerTime; 
							$res2 = mysql_query("INSERT INTO `users` (`username`, `password`, `email`, `rtime`) 
							VALUES('".$username."','".$password."','".$email."','".$registerTime."')"); 
							mail($email, $INFO['chatName'].' registration confirmation', "Thank you for registering to us".$username.",\n\nHere is your activation link. If the link doesn't work copy and paste it into your browser address bar.\n\nhttp://www.yourwebsitehere.co.uk/activate.php?code=".$code, 'From:noreply@youwebsitehere.co.uk');
							echo "<center>You have successfully registered, please visit you inbox to activate your account!</center>"; } } } } } } } } 

?>
<div id="border"> <form action="register.php" method="post"> <table border="0" cellpadding="2" cellspacing="0"> <tbody><tr> <td>Username: </td> <td><input name="username" type="text"></td> 
</tr> <tr> <td>Password: </td> <td><input name="password" type="password"></td> </tr> <tr> <td>Confirm Password: </td> <td><input name="passconf" type="password"></td> </tr> <tr> <td>Email: 
</td> <td><input name="email" size="25" type="text"></td> </tr> <tr> <td colspan="2" align="center"><input name="submit" value="Register" type="submit"></td> </tr> <tr> <td colspan="2"
align="center"><a href="login.php">Login</a> | <a href="forgot.php">Forgot Pass</a></td> </tr> </tbody></table> </form> </div>