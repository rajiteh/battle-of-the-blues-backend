<?php
	require_once('auth.php');
?>

<?php

require 'medoo.php';
$database = new medoo("botb");

$val=$_GET['val'];
$tag=$_GET['tag'];


switch ($tag) {
	 case "name1":
       	$database->update("players", 
		array("name" => $val), array("id" => "1" ));
		echo "Name 1 Updated!";
        break;
    case "name2":
       	$database->update("players", 
		array("name" => $val), array("id" => "2" ));
		echo "Name 2 Updated!";
        break;
	case "balls1":
       	$database->update("players", 
		array("ball" => $val), array("id" => "1" ));
		echo "Balls 1 Updated!";
        break;
    case "balls2":
       	$database->update("players", 
		array("ball" => $val), array("id" => "2" ));
		echo "Balls 2 Updated!";
        break;
	case "runs1":
       	$database->update("players", 
		array("runs" => $val), array("id" => "1" ));
		echo "Runs 1 Updated!";
        break;
    case "runs2":
       	$database->update("players", 
		array("runs" => $val), array("id" => 2 ));
		echo "Runs 2 Updated! ";
		break;
		
	case "current":
       	$database->update("score", 
		array("current_bat" => $val), array("id" => "1" ));
		echo "Currrent Batsman Updated!";
        break;
   }
?>