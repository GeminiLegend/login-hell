<?php 
ini_set('error_reporting', E_ALL);
require('db.php');

function dd($mixed){
	switch (gettype($mixed)) {
		case 'string':
			echo $mixed.'<br>';
		break;
		
		case 'array':
			echo '<pre>';
			print_r($mixed);
			echo '</pre>';
		break;

		case 'object':
			echo '<pre><br>';
			var_dump($mixed);
			echo '</pre><br>';
		break;

		case 'boolean':
			echo '<pre><br>';
			var_dump($mixed);
			echo '</pre><br>';
		break;
	}
}