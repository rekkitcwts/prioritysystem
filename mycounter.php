<?php
  // Start the session
  require_once('sessions.php');
  include("priority.php");

  // Insert the page header
  $page_title = 'My Counter';
  require_once('header.php');

  require_once('connections.php');

  // Make sure the user is logged in before going any further.
  if (!isset($_SESSION['id'])) {
    header('Location: login.php');
	exit();
  }

  // Show the navigation menu
  require_once('navmenu.php');

  // Connect to the database
  $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

  // Grab the counter data from the database
  
  $query = "SELECT * FROM counter WHERE id = '" . $_SESSION['id'] . "'";
  
  $data = mysqli_query($dbc, $query);

  if (mysqli_num_rows($data) == 1) {
    // The user row was found so display the user data
    $row = mysqli_fetch_array($data);
    echo '<table border="1">';
	// Counter Names
	echo '<tr>';
	echo '<th>' . getCounterName($_SESSION['id']) . '<br />Now Serving</th>';
	echo '</tr>';
	// Current Priority Number
	echo '<tr>';
	echo '<td>' . '<h1>'. getCurrentNumberId($_SESSION['id']) .'</h1>' . '</td>';
	echo '</tr>';
	echo '<tr>';
	echo '<td>' . '<a href="nextprio.php?counter_id='.$_SESSION['id'].'">Next!</a>' . '</td>';
	echo '</tr>';
	echo '</table>';
  } // End of check for a single row of user results
  else {
    echo '<p class="error">There was a problem accessing your profile.</p>';
  }

  mysqli_close($dbc);
?>

<?php
  // Insert the page footer
  require_once('footer.php');
?>
