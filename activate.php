<link rel="stylesheet" type="text/css" href="tut_files/style.css"> 
 
Unfortunatly there was an error there!"; }
else{
	$res = mysql_query("SELECT * FROM `users` WHERE `active` = '0'"); 
	while($row = mysql_fetch_assoc($res)){
		if($code == md5($row['username']).$row['rtime']){
			$res1 = mysql_query("UPDATE `users` SET `active` = '1' WHERE `id` = '".$row['id']."'");
			echo "<center>You have successfully activated your account!</center>"; } } } 

?>