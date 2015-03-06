<?php
	require_once('auth.php');
	
?>

<?php

require 'medoo.php';
$database = new medoo("botb");

$val=$_GET['val'];
$tag=$_GET['tag'];

if($tag=="del"){
	$database->delete("text", array("id"=>$val));
	echo "Deleted";
} else {
 	$database->insert("text", array("commentary" => $val));
	echo "Full Updated!";
}

include('../../vendor/autoload.php');

$ret = Pusher::getInstance()->commentaryUpdate();

if ($ret > 0) {
        echo "<br/>Cache cleared!";
}


?>