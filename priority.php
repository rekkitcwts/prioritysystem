<?php
	require_once('connections.php');

	// Connect to the database 
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 

	function getCurrentNumber($name)
	{
		// Retrieve data
		$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		$query = "SELECT number FROM counter WHERE name = '$name' LIMIT 1";
		$data = mysqli_query($dbc, $query) or die('Database is missing!');
		$row = mysqli_fetch_array($data);
		return $row['number'];
		mysqli_close($dbc);
	}
	
	function getCurrentNumberId($id)
	{
		// Retrieve data
		$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
		$query = "SELECT number FROM counter WHERE id = '$id' LIMIT 1";
		$data = mysqli_query($dbc, $query) or die('Database is missing!');
		$row = mysqli_fetch_array($data);
		return $row['number'];
		mysqli_close($dbc);
	}
	
	function getCounterId($name)
	{
		// Retrieve data
		$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		$query = "SELECT id FROM counter WHERE name = '$name' LIMIT 1";
		$data = mysqli_query($dbc, $query) or die('Database is missing!');
		$row = mysqli_fetch_array($data);
		return $row['id'];
		mysqli_close($dbc);
	}
	
	function checkLatest()
	{
		// Retrieve data
		$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
		$query = "SELECT MAX(latestid) AS latest FROM counterlatest";
		$data = mysqli_query($dbc, $query) or die('Database is missing!');
		$row = mysqli_fetch_array($data);
		return $row['latest'];
		mysqli_close($dbc);
	}
	
	function getCounterName($id)
	{
		// Retrieve data
		$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
		$query = "SELECT name FROM counter WHERE id = '$id' LIMIT 1";
		$data = mysqli_query($dbc, $query) or die('Database is missing!');
		$row = mysqli_fetch_array($data);
		return $row['name'];
		mysqli_close($dbc);
	}
		
	function nextPriorityNumber($name)
	{
		$curnum = getCurrentNumber($name);
		$next = $curnum++;
		$cid = getCounterId($name);
		$latestCounterQuery = "INSERT INTO counterlatest (counter_id) VALUES ('$cid')";
		mysqli_query($dbc, $latestCounterQuery) or die('Database is missing!');
		$numberQuery = "UPDATE counter SET number = '$next' WHERE name = '$name'";
		mysqli_query($dbc, $numberQuery) or die('Database is missing!');
		mysqli_close($dbc);
	}

?>