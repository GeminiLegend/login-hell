<link rel="stylesheet" type="text/css" href="tut_files/style.css"> 
 
You need to be logged in to user this feature!"; }
else{
	$time = date('U')+50; $update = mysql_query("UPDATE `users` SET `online` = '".$time."' WHERE `id` = '".$_SESSION['uid']."'"); ?>
	<div id="border"> <table width="100%" border="0" cellpadding="2" cellspacing="0">
	<tbody><tr> <td><strong>Users Online:</strong></td> <td> '".date('U')."'"); 
	while($row = mysql_fetch_assoc($res)){
		echo $row['username']." - "; }
?> </td> </tr> <tr> <td colspan="2" align="center"><a href="logout.php">Logout</a></td> </tr> </tbody></table> </div>