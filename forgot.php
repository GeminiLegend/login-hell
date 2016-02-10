<link rel="stylesheet" type="text/css" href="tut_files/style.css"> 
  
 You need to fill in your <strong>E-mail</strong> address!"; }
 else{
	$checkemail = "/^[a-z0-9]+([_\\.-][a-z0-9]+)*@([a-z0-9]+([\.-][a-z0-9]+)*)+\\.[a-z]{2,}$/i"; 
  
 if(!preg_match($checkemail, $email)){
	echo "<center><strong>E-mail</strong> is not valid, must be name@server.tld!</center>"; }
 else{
	$res = mysql_query("SELECT * FROM `users` WHERE `email` = '".$email."'");
	$num = mysql_num_rows($res); 
  
	 if($num == 0){
		echo "<center>The <strong>E-mail</strong> you supplied does not exist in our database!</center>"; }
	 else{
		$row = mysql_fetch_assoc($res);
		mail($email, 'Forgotten Password', "Here is your password: ".$row['password']."\n\nPlease try not too lose it again!", 'From: noreply@yourwebsitehere.co.uk');  
		echo "<center>An email has been sent too your email address containing your password!</center>"; } } } } 
  
?>
<div id="border"> <form action="forgot.php" method="post"> <table border="0" cellpadding="2" cellspacing="0"> <tbody><tr> <td>Email: </td> <td><input name="email" type="text"></td> </tr> 
<tr> <td colspan="2" align="center"><input name="submit" value="Send" type="submit"></td> </tr> <tr> <td colspan="2" align="center"><a href="register.php">Register</a> | <a 
href="login.php">Login</a></td> </tr> </tbody></table> </form> </div>