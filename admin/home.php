<?php
	require_once('auth.php');
	
	
// location of the text file that will log all the ip adresses
$file = 'logs/admin_log.txt';

// ip address of the visitor
$ipadress = $_SERVER['REMOTE_ADDR'];

// date of the visit that will be formated this way: 29/May/2011 12:20:03
$date = date('d/F/Y h:i:s');

// name of the page that was visited
$webpage = $_SERVER['SCRIPT_NAME'];

// visitor's browser information
$browser = $_SERVER['HTTP_USER_AGENT'];

// Opening the text file and writing the visitor's data
$fp = fopen($file, 'a');

fwrite($fp, $ipadress.' - ['.$date.'] '.$webpage.' '.$browser."\r\n");

fclose($fp);
?>




<html>




<body background="img/bg.png" >

 	<h2>BOTB:Admin Panel: 
	<?php echo $_SESSION['SESS_FIRST_NAME'];?></h2>

<h1> <a href="score/score_admin.php"<button class="btn btn-primary " type="button">Score</button></a></h1>
<h1> <a href="player/player_admin.php"<button class="btn btn-primary " type="button">Player</button></a></h1>
<h1> <a href="commentary/comment_admin.php"<button class="btn btn-primary " type="button">Commentary</button></a></h1>
<h1> <a href="score-card/scorecard_admin.php"<button class="btn btn-primary " type="button">Score-Card</button></a></h1>
<h1> <a href="http://198.148.112.72/view/"<button class="btn btn-primary " type="button">Show</button></a></h1>
<h1> <a href="login/logout.php"<button class="btn btn-primary " type="button">LOGOUT</button></a></h1>
</body>
</html>