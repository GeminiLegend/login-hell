<?php
session_start();
ob_start();

$hasDB 	= false;
$server = 'localhost';
$user 	= 'root';
$pass 	= 'root';
$db 	= 'login_practice';
$port	= 3306;
$debug 	= false;

// $link 	= mysql_connect($server,$user,$pass);
$mysqli = new mysqli($server, $user, $pass, $db, $port);

if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
} else {   
    $hasDB = true;
    if(! $debug) return;

    echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
	echo "Host information: " . mysqli_get_host_info($mysqli) . PHP_EOL;
}
