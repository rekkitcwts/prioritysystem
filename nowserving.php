<?php
	require_once('connections.php');
	include("priority.php");
	
	$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME); 
	
	// recent counter
	$maxLatestId = checkLatest();
	$latestCounterQuery = "SELECT * from counterlatest WHERE latestid = '" . $maxLatestId . "'";
	$LCdata = mysqli_query($dbc, $latestCounterQuery);
	$LCArray = mysqli_fetch_array($LCdata);
	$latestCounter = $LCArray['counter_id'];

	// count
	$countQuery = "SELECT COUNT(*) AS countNum FROM counter";
	$countdata = mysqli_query($dbc, $countQuery);
	$rowCountArray = mysqli_fetch_array($countdata);
	$count = $rowCountArray['countNum'];
	
	echo '<table border="1">';
	// Counter Names
	echo '<tr>';
	for ($i = 1; $i <= $count; $i++)
		echo '<th>' . getCounterName($i) . '</th>';
	echo '</tr>';
	// Latest?
	echo '<tr>';
	for ($j = 1; $j <= $count; $j++)
	{
		if ($latestCounter == $j)
			echo '<td>' . 'READY!' . '</td>';
		else
			echo '<td>' . 'WAIT FOR YOUR NUMBER' . '</td>';
	}
	echo '</tr>';
	// Current Priority Number
	echo '<tr>';
	for ($j = 1; $j <= $count; $j++)
		echo '<td>' . '<h1>'. getCurrentNumberId($j) .'</h1>' . '</td>';
	echo '</tr>';
	echo '</table>';
	// Retrieve the movie data from MySQL
 /* $query = "SELECT movie_id, title, rating, category FROM movie_table WHERE title IS NOT NULL ORDER BY purchased DESC, movie_id DESC LIMIT 20";
  $data = mysqli_query($dbc, $query);

  // Loop through the array of movie data, formatting it as HTML
  echo '<table>';
  while ($row = mysqli_fetch_array($data)) 
  {
      echo '<tr><td>' . $row['title'] . '</td><td>'.$row['rating'].'</td><td>'.$row['category'].'</td></tr>';
  }
  echo '</table>'; */

  mysqli_close($dbc);
?>