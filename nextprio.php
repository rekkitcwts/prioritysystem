<?php
	require_once('connections.php');
	include("priority.php");

	$cid = $_GET['counter_id'];
	// Connect to the database 
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
	$name = getCounterName($cid);
	$curnum = getCurrentNumber($name);
	$next = $curnum + 1;
	
	$latestCounterQuery = "INSERT INTO counterlatest (counter_id) VALUES ('$cid')";
	mysqli_query($dbc, $latestCounterQuery) or die('Database is missing!');
	$numberQuery = "UPDATE counter SET number = '$next' WHERE id = '$cid'";
	mysqli_query($dbc, $numberQuery) or die('Database is missing!');
	mysqli_close($dbc);
	header('Location: mycounter.php');
?>