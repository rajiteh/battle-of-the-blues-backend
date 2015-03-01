<?php
	require_once('auth.php');
	
?>

<?php

require 'medoo.php';
$database = new medoo("botb");

$val=$_REQUEST['val'];
$tag=$_REQUEST['tag'];

if($tag=="scorecard" && !empty($val)){
	$database->delete("scorecard", array());
 	$database->insert("scorecard",
		array("text" => $val));
		echo "Full Updated!";
	}

include('../../vendor/autoload.php');

$ret = Pusher::getInstance()->scorecardUpdate();

if ($ret > 0) {
        echo "<br/>Cache cleared!";
}
?>