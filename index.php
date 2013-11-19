<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
<title>Now Serving</title>
<link type="text/css" rel="stylesheet" href="./stylesheets/screen.css" />
<script src="scripts/jquery-1.9.1.js"></script>
<script>
 $(document).ready(function() {
 	 $("#responsecontainer").load("nowserving.php");
   var refreshId = setInterval(function() {
      $("#responsecontainer").load('nowserving.php');
   }, 999);
   $.ajaxSetup({ cache: false });
});
</script>
<script type="text/javascript">/*
var currentTime = new Date().getHours();
if (5 <= currentTime && currentTime < 6) {
	// Dawn
    if (document.body) {
        document.body.background = "./images/timebased/dawn.jpg";
    }
}
if (6 <= currentTime && currentTime < 8) {
	// Sunrise
    if (document.body) {
        document.body.background = "./images/timebased/sunrise.jpg";
    }
}
if (8 <= currentTime && currentTime < 15) {
	// Noon
    if (document.body) {
        document.body.background = "./images/timebased/noon.jpg";
    }
}
if (15 <= currentTime && currentTime < 17) {
	// Afternoon
    if (document.body) {
        document.body.background = "./images/timebased/afternoon.jpg";
    }
}
if (17 <= currentTime && currentTime < 20) {
	// Sundown
    if (document.body) {
        document.body.background = "./images/timebased/sundown.jpg";
    }
}
if (20 <= currentTime || currentTime < 5) {
	// Night
    if (document.body) {
        document.body.background = "./images/timebased/night.jpg";
    }
}*/
</script>
</head>
<body>
<div id="header">
    <h1>SCS Computer Science Department Enrollment</h1>
</div>
<div id="navigation">
	<ul>
		<li>Now Serving</li>
	</ul>
</div>
<div id="wrap">
	<br />
	<div id="responsecontainer">
		<p>Loading...</p>
	</div>
	<p>Please wait until your number is shown on screen.</p>
	<br />
</div>
<div id="wrapbot">
	<ul>
		<li>Copyright &copy;2013 Department of Computer Science, MSU-IIT</li>
	</ul>
</div>

</body>
</html>