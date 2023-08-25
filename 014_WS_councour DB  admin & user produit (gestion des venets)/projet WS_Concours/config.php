<?php 

	$server = 'localhost';
	$username = 'root';
	$password = '';
	$dbname = 'ws_concours';

	$db=mysqli_connect($server,$username,$password,$dbname);



// Check connection
if(!$db) {
		die("Connection Failed ");
    exit;
	} 