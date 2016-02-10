<?php require_once('lib/config.php');

if(array_key_exists('auth', $_SESSION)){
	$auth 		= (string) $_SESSION['auth'];
	$username 	= $_SESSION['username'];
} else {
	$auth = 'false';
}
?>

<script type="text/javascript">
	var authed = <?php echo $auth; ?>;
</script>